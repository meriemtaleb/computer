<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * إضافة منتج إلى السلة
     */
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = Session::get('cart', []);

        // إذا كان المنتج موجودًا بالفعل في السلة، قم بزيادة الكمية
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            // إضافة المنتج إلى السلة
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1,
            ];
        }

        // تحقق من المخزون
        if ($product->stock < $cart[$id]['quantity']) {
            return redirect()->back()->with('error', 'الكمية المطلوبة غير متوفرة في المخزون.');
        }

        // حفظ السلة في الجلسة
        Session::put('cart', $cart);

        return redirect()->route('cart.show')->with('success', 'تم إضافة المنتج إلى السلة بنجاح!');
    }

    /**
     * عرض صفحة السلة
     */
  public function showCart()
{
    $cart = Session::get('cart', []);
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    $deliveryCost = 1000; // توحيد تكلفة التوصيل
    $finalTotal = $total + $deliveryCost;

    return view('cart', compact('cart', 'total', 'deliveryCost', 'finalTotal'));
}

    /**
     * تحديث كمية منتج في السلة
     */
    public function updateCart(Request $request, $id)
    {
        $cart = Session::get('cart', []);
        $quantity = $request->input('quantity');

        if (isset($cart[$id])) {
            $product = Product::findOrFail($id);

            // التحقق من المخزون
            if ($product->stock < $quantity) {
                return redirect()->back()->with('error', 'الكمية المطلوبة غير متوفرة في المخزون.');
            }

            $cart[$id]['quantity'] = $quantity;
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'تم تحديث الكمية بنجاح!');
    }

    /**
     * حذف منتج من السلة
     */
    public function removeFromCart($id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'تم إزالة المنتج من السلة بنجاح!');
    }

    /**
     * إتمام الشراء
     */
public function checkout(Request $request)
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'السلة فارغة!');
        }

        // توجيه إلى صفحة النموذج مع بيانات السلة
        return redirect()->route('order.create');
    }
}

