<?php
namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function index(){ $categories = Category::paginate(10); return view('categories.index',compact('categories')); }
    public function create(){ return view('categories.create'); }
    public function store(Request $r){ $r->validate(['name'=>'required|unique:categories']); Category::create(['name'=>$r->name,'slug'=>\Str::slug($r->name)]); return redirect()->route('categories.index')->with('success','Categoría creada'); }
    public function edit(Category $category){ return view('categories.edit',compact('category')); }
    public function update(Request $r, Category $category){ $r->validate(['name'=>'required|unique:categories,name,'.$category->id]); $category->update(['name'=>$r->name,'slug'=>\Str::slug($r->name)]); return redirect()->route('categories.index')->with('success','Actualizada'); }
    public function destroy(Category $category){ $category->delete(); return redirect()->route('categories.index')->with('success','Eliminada'); }
}
