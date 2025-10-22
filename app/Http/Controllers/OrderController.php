<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('products')->paginate(10);
        $products = Product::paginate(10);
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        $totalRevenue = Order::sum('the_final_price');
        $totalCustomers = Order::distinct('phone_number')->count();
        return view('admin.orders', compact('orders', 'products', 'totalOrders', 'totalProducts', 'totalRevenue', 'totalCustomers'));
    }

    public function create(Request $request)
    {
        $singleProductId = $request->query('product_id');
        $cart = [];

        // ✅ منتج واحد أو السلة الكاملة
        if ($singleProductId) {
            $product = Product::findOrFail($singleProductId);
            $cart = [
                $product->id => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->image,
                    'quantity' => 1,
                ]
            ];
        } else {
            $cart = Session::get('cart', []);
        }

        // 🧮 حساب المجموع
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // ✅ تحميل الولايات عبر المسار فقط (public_path)
        $wilayas = [];
        $deliveryCost = 1000;

        try {
            $path = public_path('wilayas.json');
            if (file_exists($path)) {
                $wilayasData = json_decode(file_get_contents($path), true);

                if (isset($wilayasData['wilayas']) && is_array($wilayasData['wilayas'])) {
                    foreach ($wilayasData['wilayas'] as $wilaya) {
                        $wilayas[] = [
                            'value' => strtolower(str_replace(' ', '_', $wilaya['name'])),
                            'name' => $wilaya['name'],
                            'prix_unitaire' => $wilaya['prix_unitaire'],
                            'stop_desk' => $wilaya['stop_desk'] ?? null,
                        ];
                    }
                    $deliveryCost = $wilayas[0]['prix_unitaire'] ?? 1000;
                } else {
                    Log::warning('⚠️ ملف wilayas.json لا يحتوي على مفتاح "wilayas" صالح.');
                }
            } else {
                Log::error('❌ ملف wilayas.json غير موجود في public.');
            }
        } catch (\Throwable $e) {
            Log::error('💥 خطأ أثناء قراءة الملف: ' . $e->getMessage());
        }

        $finalTotal = $total + $deliveryCost;

        return view('form', compact('cart', 'total', 'deliveryCost', 'finalTotal', 'wilayas'));
    }

    public function store(Request $request)
    {
        try {
            Log::info('Validated data:', $request->all());

            $path = public_path('wilayas.json');
            if (!file_exists($path)) {
                return redirect()->back()->with('error', '❌ ملف wilayas.json غير موجود.');
            }

            $wilayasData = json_decode(file_get_contents($path), true)['wilayas'] ?? [];
            if (empty($wilayasData)) {
                return redirect()->back()->with('error', '❌ بيانات الولايات غير متوفرة في wilayas.json.');
            }

            $validWilayas = array_map(fn($w) => strtolower(str_replace(' ', '_', $w['name'])), $wilayasData);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone_number' => 'required',
                'wilaya' => 'required|string|in:' . implode(',', $validWilayas),
                'delivery_type' => 'required|in:home_delivery,stop_desk',
                'products.*.id' => 'required|exists:products,id',
                'products.*.quantity' => 'required|integer|min:1',
            ]);

            DB::beginTransaction();

            $selected = collect($wilayasData)->first(
                fn($w) => strtolower(str_replace(' ', '_', $w['name'])) === $validated['wilaya']
            );

            if (!$selected) {
                return redirect()->back()->with('error', '❌ الولاية المختارة غير صالحة.');
            }

            $deliveryCost = $validated['delivery_type'] === 'home_delivery'
                ? $selected['prix_unitaire']
                : ($selected['stop_desk'] ?? $selected['prix_unitaire']);

            if (!is_numeric($deliveryCost)) {
                return redirect()->back()->with('error', '❌ تكلفة التوصيل غير صالحة.');
            }

            $order = new Order();
            $order->fill([
                'name' => $validated['name'],
                'phone_number' => $validated['phone_number'],
                'wilaya' => $validated['wilaya'],
                'delivery_type' => $validated['delivery_type'], // Store English value
                'status' => 'pending',
            ]);

            $totalPrice = 0;
            foreach ($validated['products'] as $data) {
                $product = Product::findOrFail($data['id']);
                if ($product->stock < $data['quantity']) {
                    DB::rollBack();
                    return redirect()->back()->with('error', "❌ الكمية المطلوبة للمنتج {$product->name} غير متوفرة في المخزون.");
                }
                $totalPrice += $product->price * $data['quantity'];
            }

            $order->the_final_price = $totalPrice + $deliveryCost;
            $order->save();

            foreach ($validated['products'] as $data) {
                $product = Product::findOrFail($data['id']);
                $order->products()->attach($product->id, [
                    'quantity' => $data['quantity'],
                    'total_price' => $product->price * $data['quantity'],
                ]);
                $product->decrement('stock', $data['quantity']);
            }

            DB::commit();
            Session::forget('cart');

            return redirect()->back()->with('sent', '✅ تم إرسال الطلب بنجاح!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            Log::error('Validation error: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('💥 فشل إنشاء الطلب: ' . $e->getMessage());
            return redirect()->back()->with('error', '❌ خطأ في النظام: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $order = Order::with('products')->findOrFail($id);
        $wilayas = [];

        try {
            $path = public_path('wilayas.json');
            if (file_exists($path)) {
                $wilayas = json_decode(file_get_contents($path), true)['wilayas'] ?? [];
            } else {
                $wilayas = [['value' => 'default', 'name' => 'غير محدد']];
            }
        } catch (\Throwable $e) {
            Log::error('💥 خطأ أثناء تحميل wilayas.json: ' . $e->getMessage());
        }

        return view('admin.order-edit', compact('order', 'wilayas'));
    }
    
    public function update(Request $request, $id)
    {
        try {
            $path = public_path('wilayas.json');
            $wilayas = json_decode(file_get_contents($path), true)['wilayas'] ?? [];
            $validWilayas = array_map(fn($w) => strtolower(str_replace(' ', '_', $w['name'])), $wilayas);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone_number' => 'required|regex:/^05[0-9]{8}$/',
                'wilaya' => 'required|string|in:' . implode(',', $validWilayas),
                'delivery_type' => 'required|in:home_delivery,stop_desk',
                'status' => 'required|in:pending,shipped,cancelled',
                'quantity' => 'required|integer|min:1',
            ]);

            $order = Order::findOrFail($id);
            $product = $order->products()->first();

            $selected = collect($wilayas)->first(
                fn($w) => strtolower(str_replace(' ', '_', $w['name'])) === $validated['wilaya']
            );

            if (!$selected) {
                return redirect()->back()->with('error', '❌ الولاية المختارة غير صالحة.');
            }

            $deliveryCost = $validated['delivery_type'] === 'home_delivery'
                ? $selected['prix_unitaire']
                : ($selected['stop_desk'] ?? $selected['prix_unitaire']);

            $order->update([
                'name' => $validated['name'],
                'phone_number' => $validated['phone_number'],
                'wilaya' => $validated['wilaya'],
                'delivery_type' => $validated['delivery_type'], // Store English value
                'status' => $validated['status'],
                'the_final_price' => ($product->price * $validated['quantity']) + $deliveryCost,
            ]);

            $order->products()->updateExistingPivot($product->id, [
                'quantity' => $validated['quantity'],
                'total_price' => $product->price * $validated['quantity'],
            ]);

            return redirect()->route('order.index')->with('success', '✅ تم تحديث الطلب بنجاح.');
        } catch (\Throwable $e) {
            Log::error('💥 فشل تحديث الطلب: ' . $e->getMessage());
            return redirect()->back()->with('error', '❌ خطأ في النظام: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $product = $order->products()->first();

        if ($product) {
            $product->increment('stock', $order->products()->first()->pivot->quantity);
        }

        $order->products()->detach();
        $order->delete();

        return redirect()->route('order.index')->with('success', '🗑️ تم حذف الطلب بنجاح.');
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $status = trim($request->input('status'));
        $validStatuses = ['pending', 'shipped', 'cancelled'];

        if (in_array($status, $validStatuses)) {
            $order->update(['status' => $status]);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => '❌ حالة غير صالحة'], 400);
    }

    // Helper method to display delivery type in Arabic in views
    public static function getDeliveryTypeArabic($deliveryType)
    {
        return match($deliveryType) {
            'home_delivery' => ' المنزل',
            'stop_desk' => ' مكتب',
            default => $deliveryType,
        };
    }

    // Helper method to display status in Arabic in views
    public static function getStatusArabic($status)
    {
        return match($status) {
            'pending' => 'قيد الانتظار',
            'shipped' => 'تم الشحن',
            'cancelled' => 'ملغى',
            default => $status,
        };
    }
}