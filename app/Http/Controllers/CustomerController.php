<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(10);
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'email'=>'nullable|email|unique:customers',
            'phone'=>'nullable',
            'address'=>'nullable'
        ]);

        Customer::create($data);
        return redirect()->route('customers.index')->with('success','Cliente creado!');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name'=>'required',
            'email'=>'nullable|email|unique:customers,email,'.$customer->id,
            'phone'=>'nullable',
            'address'=>'nullable'
        ]);

        $customer->update($data);
        return redirect()->route('customers.index')->with('success','Cliente actualizado');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return back()->with('success','Cliente eliminado');
    }
}
