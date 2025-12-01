<?php
namespace App\Http\Controllers;
use App\Models\Client; use Illuminate\Http\Request;

class ClientController extends Controller {
    public function index(){ $clients = Client::paginate(10); return view('clients.index',compact('clients')); }
    public function create(){ return view('clients.create'); }
    public function store(Request $r){ $r->validate(['name'=>'required','email'=>'nullable|email|unique:clients','phone'=>'nullable','address'=>'nullable']); Client::create($r->all()); return redirect()->route('clients.index')->with('success','Cliente creado'); }
    public function show(Client $client){ return view('clients.show',compact('client')); }
    public function edit(Client $client){ return view('clients.edit',compact('client')); }
    public function update(Request $r, Client $client){ $r->validate(['name'=>'required','email'=>'nullable|email|unique:clients,email,'.$client->id]); $client->update($r->all()); return redirect()->route('clients.index')->with('success','Actualizado'); }
    public function destroy(Client $client){ $client->delete(); return redirect()->route('clients.index')->with('success','Eliminado'); }
}
