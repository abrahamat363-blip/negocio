<?php
namespace App\Http\Controllers;
use App\Models\Sale; use App\Models\SaleItem; use App\Models\Product; use App\Models\Client;
use Illuminate\Http\Request; use Illuminate\Support\Facades\DB;

class SaleController extends Controller {
    public function index(){ $sales = Sale::with('client')->paginate(10); return view('sales.index',compact('sales')); }
    public function create(){ $clients = Client::all(); $products = Product::where('stock','>',0)->get(); return view('sales.create',compact('clients','products')); }
    public function store(Request $r){
        $r->validate(['client_id'=>'nullable|exists:clients,id','items'=>'required|array']);
        DB::transaction(function() use($r){
            $sale = Sale::create(['client_id'=>$r->client_id,'user_id'=>auth()?auth()->id():null,'total'=>0,'status'=>'pending']);
            $total = 0;
            foreach($r->items as $it){
                $product = Product::find($it['product_id']);
                $qty = (int)$it['quantity'];
                $subtotal = $product->price * $qty;
                SaleItem::create(['sale_id'=>$sale->id,'product_id'=>$product->id,'quantity'=>$qty,'unit_price'=>$product->price,'subtotal'=>$subtotal]);
                $product->decrement('stock',$qty);
                $total += $subtotal;
            }
            $sale->update(['total'=>$total,'status'=>'paid']);
        });
        return redirect()->route('sales.index')->with('success','Venta registrada');
    }
    public function show(Sale $sale){ $sale->load('items.product','client'); return view('sales.show',compact('sale')); }
}
