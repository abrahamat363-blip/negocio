<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create', [
            'customers' => Customer::all(),
            'products' => Product::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id'=>'required',
            'items'=>'required|array'
        ]);

        $order = Order::create([
            'customer_id' => $request->customer_id,
            'user_id' => auth()->id(),
            'total' => 0,
            'status' => 'pending'
        ]);

        $total = 0;

        foreach ($request->items as $item) {
            $product = Product::find($item['product_id']);

            $subtotal = $product->price * $item['quantity'];
            $total += $subtotal;

            OrderItem::create([
                'order_id'=>$order->id,
                'product_id'=>$product->id,
                'quantity'=>$item['quantity'],
                'unit_price'=>$product->price,
                'subtotal'=>$subtotal
            ]);

            // Restar stock
            $product->decrement('stock', $item['quantity']);
        }

        $order->update(['total' => $total]);

        return redirect()->route('orders.index')->with('success','Orden creada!');
    }
}
