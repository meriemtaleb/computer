<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Productorder;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'price'     => 'required|numeric|min:0',
            'category'  => 'required|string|max:100',
            'stock'     => 'required|integer|min:0',
            'status'    => 'required|string|max:255',
            'cpu'       => 'nullable|string|max:255',
            'gpu'       => 'nullable|string|max:255',
            'ram'       => 'nullable|string|max:50',
            'storage'   => 'nullable|string|max:100',
            'screen'    => 'nullable|string|max:100',
            'battery'   => 'nullable|string|max:100',
            'charger'   => 'nullable|string|max:100',
            'keybored'  => 'nullable|string|max:100',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $imagePath = $image->storeAs('uploads', $imageName, 'public');
        $validated['image'] = $imagePath;

        Product::create($validated);

       return redirect()->route('admin.add')->with('success', 'تم إنشاء المنتج بنجاح!');


    }

    public function showmainpage(Request $request){
        $products = Product::paginate(10);;
        return  view ('products' ,compact('products'));
    }
       public function showAdmin(Request $request){
        $products = Product::paginate(10);;
        return  view ('admin/products' ,compact('products'));
    }

    public function showAddForm() {
    return view('admin.add'); // تأكدي أن الملف موجود
   }
     public function showProductsindex(){
          $products = Product::where('stock', '>', 0)->inRandomOrder()->take(3)->get();
          return view('index', compact('products'));
   }

   public function showProdcutfilter(Request $request){

       
        $query = Product::query();

        // بحث بالكلمة
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        $products = $query->get();


    if($products->isEmpty()) {
          return view('products', [
        'products' => collect(),
        'no_products' => 'لم يتم العثور على أي منتجات 😢'
    ]);
    }
    return view('products', compact('products'));
}
public function showProductdetail($id){
    $product=Product::FindOrFail($id);
    return view('productdetail',compact('product'));

}
public function delete($id){
      $product=Product::FindOrFail($id);
      $product->delete();
       return redirect()->back()->with('delete','the product has been deleted successfuly');

}
public function edit($id){
    
      $product=Product::FindOrFail($id);
     return  view('admin.edit', compact('product')) ;
}
public function update( Request $request ,$id){
        $product=Product::FindOrFail($id);


            $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'price'     => 'required|numeric|min:0',
            'category'  => 'required|string|max:100',
            'stock'     => 'required|integer|min:0',
            'status'    => 'required|string|max:255',
            'cpu'       => 'nullable|string|max:255',
            'gpu'       => 'nullable|string|max:255',
            'ram'       => 'nullable|string|max:50',
            'storage'   => 'nullable|string|max:100',
            'screen'    => 'nullable|string|max:100',
            'battery'   => 'nullable|string|max:100',
            'charger'   => 'nullable|string|max:100',
            'keybored'  => 'nullable|string|max:100',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);



      $fieldsToLower = ['name', 'category', 'status', 'cpu', 'gpu', 'ram', 'storage', 'screen', 'battery', 'charger', 'keybored'];
    foreach($fieldsToLower as $field){
        if(isset($validated[$field])){
            $validated[$field] = strtolower($validated[$field]);
        }
    }

if ($request->hasFile('image')) {
    // حذف الصورة القديمة إذا موجودة
    if ($product->image && Storage::disk('public')->exists($product->image)) {
        Storage::disk('public')->delete($product->image);
    }

    $image = $request->file('image');
    $imageName = time() . '_' . $image->getClientOriginalName();
    $imagePath = $image->storeAs('uploads', $imageName, 'public');
    $validated['image'] = $imagePath;
} else {
    $validated['image'] = $product->image;
}

    
  $product->update($validated);
   return redirect()->back()->with('update','the item has been updated successfuly');

   }

}
