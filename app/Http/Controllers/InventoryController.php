<?php
namespace App\Http\Controllers;
use App\Models\InventoryMovement; use App\Models\Product; use Illuminate\Http\Request;

class InventoryController extends Controller {
    public function index(){ $moves = InventoryMovement::with('product','user')->latest()->paginate(15); return view('inventory.index',compact('moves')); }
    public function create(){ $products = Product::all(); return view('inventory.create',compact('products')); }
    public function store(Request $r){
        $r->validate(['product_id'=>'required|exists:products,id','quantity'=>'required|integer','type'=>'required|in:in,out','reason'=>'nullable']);
        $p = Product::find($r->product_id);
        if($r->type=='in') $p->increment('stock',$r->quantity); else $p->decrement('stock',$r->quantity);
        InventoryMovement::create(['product_id'=>$p->id,'quantity'=>$r->quantity,'type'=>$r->type,'reason'=>$r->reason,'user_id'=>auth()?auth()->id():null]);
        return redirect()->route('inventory.index')->with('success','Movimiento registrado');
    }
}
