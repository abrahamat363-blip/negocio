<?php
namespace App\Http\Controllers;
use App\Models\Invoice; use App\Models\Sale; use Illuminate\Http\Request;

class InvoiceController extends Controller {
    public function index(){ $invoices = Invoice::with('sale')->paginate(10); return view('invoices.index',compact('invoices')); }
    public function show(Invoice $invoice){ return view('invoices.show',compact('invoice')); }
}
