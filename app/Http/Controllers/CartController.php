<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1,
            ];
        }

        if ($product->stock < $cart[$id]['quantity']) {
            return redirect()->back()->with('error', 'الكمية المطلوبة غير متوفرة في المخزون.');
        }

        Session::put('cart', $cart);
        return redirect()->route('cart.show')->with('success', 'تم إضافة المنتج إلى السلة بنجاح!');
    }

public function showCart()
{
    $cart = Session::get('cart', []);
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    $wilayas = [];
    $deliveryCost = 1000;

    try {
        // ✅ استعملي المسار الكامل نحو public مباشرة
        $path = base_path('public/wilayas.json');

        if (file_exists($path)) {
            $jsonContent = file_get_contents($path);
            $wilayasJson = json_decode($jsonContent, true);

            // ✅ دعم الحالتين: سواء فيه مفتاح "wilayas" أو مباشرة array
            $wilayasArray = isset($wilayasJson['wilayas']) ? $wilayasJson['wilayas'] : $wilayasJson;

            if (is_array($wilayasArray)) {
                foreach ($wilayasArray as $wilaya) {
                    $wilayas[] = [
                        'value' => strtolower(str_replace(' ', '_', $wilaya['name'] ?? '')),
                        'name' => $wilaya['name'] ?? 'غير محدد',
                        'prix_unitaire' => $wilaya['prix_unitaire'] ?? 1000,
                        'stop_desk' => $wilaya['stop_desk'] ?? null,
                    ];
                }

                $deliveryCost = !empty($wilayas) ? $wilayas[0]['prix_unitaire'] : 1000;
            } else {
                Log::error('wilayas.json: الصيغة غير صحيحة');
                $wilayas = [['value' => 'default', 'name' => 'غير محدد', 'prix_unitaire' => 1000]];
            }
        } else {
            Log::error('❌ wilayas.json غير موجود في مجلد public');
            $wilayas = [['value' => 'default', 'name' => 'غير محدد', 'prix_unitaire' => 1000]];
        }
    } catch (\Exception $e) {
        Log::error('⚠️ خطأ أثناء تحميل wilayas.json: ' . $e->getMessage());
        $wilayas = [['value' => 'default', 'name' => 'غير محدد', 'prix_unitaire' => 1000]];
    }

    $finalTotal = $total + $deliveryCost;

    return view('cart', compact('cart', 'total', 'deliveryCost', 'finalTotal', 'wilayas'));
}


    public function updateCart(Request $request, $id)
    {
        $cart = Session::get('cart', []);
        $quantity = $request->input('quantity');

        if (isset($cart[$id])) {
            $product = Product::findOrFail($id);

            if ($product->stock < $quantity) {
                return redirect()->back()->with('error', 'الكمية المطلوبة غير متوفرة في المخزون.');
            }

            $cart[$id]['quantity'] = $quantity;
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'تم تحديث الكمية بنجاح!');
    }

    public function removeFromCart($id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'تم إزالة المنتج من السلة بنجاح!');
    }

    public function checkout(Request $request)
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'السلة فارغة!');
        }

        return redirect()->route('order.create');
    }
}