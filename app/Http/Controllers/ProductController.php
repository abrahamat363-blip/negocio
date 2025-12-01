<?php
namespace App\Http\Controllers;
use App\Models\Product; use App\Models\Category;
use Illuminate\Http\Request; use Illuminate\Support\Facades\Storage;

class ProductController extends Controller {
    public function index(){ $products = Product::with('category')->paginate(10); return view('products.index',compact('products')); }
    public function create(){ $categories = Category::all(); return view('products.create',compact('categories')); }
    public function store(Request $r){
        $data = $r->validate(['sku'=>'nullable|unique:products','name'=>'required','category_id'=>'nullable','description'=>'nullable','price'=>'required|numeric','stock'=>'required|integer','image'=>'nullable|image|max:2048']);
        if($r->hasFile('image')) $data['image']=$r->file('image')->store('products','public');
        Product::create($data);
        return redirect()->route('products.index')->with('success','Producto creado');
    }
    public function show(Product $product){ return view('products.show',compact('product')); }
    public function edit(Product $product){ $categories = Category::all(); return view('products.edit',compact('product','categories')); }
    public function update(Request $r, Product $product){
        $data = $r->validate(['sku'=>'nullable|unique:products,sku,'.$product->id,'name'=>'required','category_id'=>'nullable','description'=>'nullable','price'=>'required|numeric','stock'=>'required|integer','image'=>'nullable|image|max:2048']);
        if($r->hasFile('image')){ if($product->image) Storage::disk('public')->delete($product->image); $data['image']=$r->file('image')->store('products','public'); }
        $product->update($data);
        return redirect()->route('products.index')->with('success','Producto actualizado');
    }
    public function destroy(Product $product){ if($product->image) Storage::disk('public')->delete($product->image); $product->delete(); return redirect()->route('products.index')->with('success','Eliminado'); }
}
