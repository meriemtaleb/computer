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
    /**
     * عرض نموذج إنشاء طلب
     */
    public function create(Request $request)
    {
        $singleProductId = $request->query('product_id');
        $cart = [];
        if ($singleProductId) {
            // طلب منتج واحد
            $product = Product::findOrFail($singleProductId);
            $cart = [
                $product->id => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->image,
                    'quantity' => 1, // الكمية الافتراضية للطلب الفردي
                ]
            ];
        } else {
            // طلبات متعددة من السلة
            $cart = Session::get('cart', []);
        }
        // حساب المجموع الفرعي
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        $deliveryCost = 1000; // تكلفة التوصيل
        $finalTotal = $total + $deliveryCost;
        // قائمة الولايات الجزائرية
        $wilayas = [
            ['value' => 'adrar', 'name' => 'أدرار'],
            ['value' => 'chlef', 'name' => 'الشلف'],
            ['value' => 'laghouat', 'name' => 'الأغواط'],
            ['value' => 'oum_el_bouaghi', 'name' => 'أم البواقي'],
            ['value' => 'batna', 'name' => 'باتنة'],
            ['value' => 'bejaia', 'name' => 'بجاية'],
            ['value' => 'biskra', 'name' => 'بسكرة'],
            ['value' => 'bechar', 'name' => 'بشار'],
            ['value' => 'blida', 'name' => 'البليدة'],
            ['value' => 'bouira', 'name' => 'البويرة'],
            ['value' => 'tamanrasset', 'name' => 'تمنراست'],
            ['value' => 'tebessa', 'name' => 'تبسة'],
            ['value' => 'tlemcen', 'name' => 'تلمسان'],
            ['value' => 'tiaret', 'name' => 'تيارت'],
            ['value' => 'tizi_ouzou', 'name' => 'تيزي وزو'],
            ['value' => 'algiers', 'name' => 'الجزائر'],
            ['value' => 'djelfa', 'name' => 'الجلفة'],
            ['value' => 'jijel', 'name' => 'جيجل'],
            ['value' => 'setif', 'name' => 'سطيف'],
            ['value' => 'saida', 'name' => 'سعيدة'],
            ['value' => 'skikda', 'name' => 'سكيكدة'],
            ['value' => 'sidi_bel_abbes', 'name' => 'سيدي بلعباس'],
            ['value' => 'annaba', 'name' => 'عنابة'],
            ['value' => 'guelma', 'name' => 'قالمة'],
            ['value' => 'constantine', 'name' => 'قسنطينة'],
            ['value' => 'medea', 'name' => 'المدية'],
            ['value' => 'mostaganem', 'name' => 'مستغانم'],
            ['value' => 'msila', 'name' => 'المسيلة'],
            ['value' => 'mascara', 'name' => 'معسكر'],
            ['value' => 'ouargla', 'name' => 'ورقلة'],
            ['value' => 'oran', 'name' => 'وهران'],
            ['value' => 'el_bayadh', 'name' => 'البيض'],
            ['value' => 'illizi', 'name' => 'إليزي'],
            ['value' => 'bordj_bou_arreridj', 'name' => 'برج بوعريريج'],
            ['value' => 'boumerdes', 'name' => 'بومرداس'],
            ['value' => 'el_tarf', 'name' => 'الطارف'],
            ['value' => 'tindouf', 'name' => 'تندوف'],
            ['value' => 'tissemsilt', 'name' => 'تيسمسيلت'],
            ['value' => 'el_oued', 'name' => 'الوادي'],
            ['value' => 'khenchela', 'name' => 'خنشلة'],
            ['value' => 'souk_ahras', 'name' => 'سوق أهراس'],
            ['value' => 'tipaza', 'name' => 'تيبازة'],
            ['value' => 'mila', 'name' => 'ميلة'],
            ['value' => 'ain_defla', 'name' => 'عين الدفلى'],
            ['value' => 'naama', 'name' => 'النعامة'],
            ['value' => 'ain_temouchent', 'name' => 'عين تموشنت'],
            ['value' => 'ghardaia', 'name' => 'غرداية'],
            ['value' => 'relizane', 'name' => 'غليزان'],
            ['value' => 'timimoun', 'name' => 'تيميمون'],
            ['value' => 'bordj_badji_mokhtar', 'name' => 'برج باجي مختار'],
            ['value' => 'ouled_djellal', 'name' => 'أولاد جلال'],
            ['value' => 'beni_abbes', 'name' => 'بني عباس'],
            ['value' => 'in_salah', 'name' => 'عين صالح'],
            ['value' => 'in_guezzam', 'name' => 'عين قزام'],
            ['value' => 'touggourt', 'name' => 'تقرت'],
            ['value' => 'djanet', 'name' => 'جانت'],
            ['value' => 'el_meghaier', 'name' => 'المغير'],
            ['value' => 'el_menia', 'name' => 'المنيعة'],
        ];
        // تمرير $cart و $wilayas إلى العرض
        return view('form', compact('cart', 'total', 'deliveryCost', 'finalTotal', 'wilayas'));
    }
    /**
     * تخزين الطلب
     */
    public function store(Request $request)
    {
        try {
            Log::info('Order Store Request Received:', $request->all());
            // قائمة قيم الولايات الصالحة
            $validWilayas = [
                'adrar', 'chlef', 'laghouat', 'oum_el_bouaghi', 'batna', 'bejaia', 'biskra', 'bechar',
                'blida', 'bouira', 'tamanrasset', 'tebessa', 'tlemcen', 'tiaret', 'tizi_ouzou', 'algiers',
                'djelfa', 'jijel', 'setif', 'saida', 'skikda', 'sidi_bel_abbes', 'annaba', 'guelma',
                'constantine', 'medea', 'mostaganem', 'msila', 'mascara', 'ouargla', 'oran', 'el_bayadh',
                'illizi', 'bordj_bou_arreridj', 'boumerdes', 'el_tarf', 'tindouf', 'tissemsilt', 'el_oued',
                'khenchela', 'souk_ahras', 'tipaza', 'mila', 'ain_defla', 'naama', 'ain_temouchent',
                'ghardaia', 'relizane', 'timimoun', 'bordj_badji_mokhtar', 'ouled_djellal', 'beni_abbes',
                'in_salah', 'in_guezzam', 'touggourt', 'djanet', 'el_meghaier', 'el_menia'
            ];
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone_number' => 'required',
                'wilaya' => 'required|string|in:' . implode(',', $validWilayas),
                'products.*.id' => 'required|exists:products,id',
                'products.*.quantity' => 'required|integer|min:1',
            ]);
            Log::info('Validation Passed');
            // بناء السلة من بيانات النموذج
            $cart = [];
            foreach ($validated['products'] as $productId => $data) {
                $product = Product::findOrFail($productId);
                $cart[$productId] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->image,
                    'quantity' => $data['quantity'],
                ];
            }
            if (empty($cart)) {
                Log::error('Cart is empty');
                return redirect()->back()->with('error', '❌ خطأ: السلة فارغة.');
            }
            DB::beginTransaction();
            // إنشاء الطلب
            $order = new Order();
            $order->name = $validated['name'];
            $order->phone_number = $validated['phone_number'];
            $order->wilaya = $validated['wilaya'];
            $order->status = 'pending';
            $totalPrice = 0;
            // حساب السعر الإجمالي وتحديث المخزون
            foreach ($cart as $productId => $item) {
                $product = Product::findOrFail($productId);
                $quantity = $item['quantity'];
                if ($product->stock < $quantity) {
                    Log::error('Insufficient stock for product ID: ' . $productId);
                    DB::rollBack();
                    return redirect()->back()->with('error', '❌ خطأ: الكمية المطلوبة غير متوفرة للمنتج: ' . $product->name);
                }
                $totalPrice += $product->price * $quantity;
            }
            $order->the_final_price = $totalPrice + 1000; // إضافة تكلفة التوصيل
            $order->save();
            Log::info('Order created:', ['order_id' => $order->id]);
            // ربط المنتجات بالطلب وتحديث المخزون
            foreach ($cart as $productId => $item) {
                $product = Product::findOrFail($productId);
                $quantity = $item['quantity'];
                $order->products()->attach($product->id, [
                    'quantity' => $quantity,
                    'total_price' => $product->price * $quantity
                ]);
                // تحديث المخزون
                $product->stock -= $quantity;
                $product->save();
                Log::info('Product attached and stock updated:', ['product_id' => $product->id, 'new_stock' => $product->stock]);
            }
            DB::commit();
            // مسح السلة فقط إذا كانت المنتجات من السلة الأصلية
            if (!$request->query('product_id')) {
                Session::forget('cart');
            }
            Log::info('Order completed successfully');
            return redirect()->back()->with('sent', '✅ تم إرسال طلبك بنجاح! سنتواصل معك قريبًا.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Order Creation Failed:', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('error', '❌ خطأ في النظام: ' . $e->getMessage());
        }
    }
    /**
     * عرض قائمة الطلبات في لوحة الإدارة
     */
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
    /**
     * عرض نموذج تعديل الطلب
     */
    public function edit($id)
    {
        $order = Order::with('products')->findOrFail($id);
        return view('admin.order-edit', compact('order'));
    }
    /**
     * تحديث الطلب
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required',
            'wilaya' => 'required|string',
            'status' => 'required|in:pending,shipped,cancelled',
            'quantity' => 'required|integer|min:1',
        ]);
        $order = Order::findOrFail($id);
        $product = $order->products()->first();
        // التحقق من المخزون
        if ($product->stock + $order->products()->first()->pivot->quantity < $validated['quantity']) {
            return redirect()->back()->with('error', 'الكمية المطلوبة غير متوفرة في المخزون.');
        }
        // استعادة المخزون القديم
        $product->stock += $order->products()->first()->pivot->quantity;
        $product->save();
        // تحديث الطلب
        $order->update([
            'name' => $validated['name'],
            'phone_number' => $validated['phone_number'],
            'wilaya' => $validated['wilaya'],
            'status' => $validated['status'],
            'the_final_price' => ($product->price * $validated['quantity']) + 1000,
        ]);
        $order->products()->updateExistingPivot($product->id, [
            'quantity' => $validated['quantity'],
            'total_price' => $product->price * $validated['quantity'],
        ]);
        // تقليل المخزون بناءً على الكمية الجديدة
        $product->stock -= $validated['quantity'];
        $product->save();
        return redirect()->route('order.index')->with('success', 'تم تحديث الطلب بنجاح.');
    }
    /**
     * حذف الطلب
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $product = $order->products()->first();
        // استعادة المخزون
        if ($product) {
            $product->stock += $order->products()->first()->pivot->quantity;
            $product->save();
        }
        $order->products()->detach();
        $order->delete();
        return redirect()->route('order.index')->with('success', 'تم حذف الطلب بنجاح.');
    }
    /**
     * تحديث حالة الطلب عبر AJAX
     */
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $status = trim($request->input('status')); // إزالة أي مسافات زائدة
        $validStatuses = ['pending', 'shipped', 'cancelled'];
        Log::info('updateStatus called', ['order_id' => $id, 'status' => $status]);
        if (in_array($status, $validStatuses)) {
            $order->status = $status;
            $order->save();
            return response()->json(['success' => true]);
        }
        Log::error('Invalid status received', ['status' => $status]);
        return response()->json(['success' => false, 'message' => 'حالة غير صالحة'], 400);
    }
}