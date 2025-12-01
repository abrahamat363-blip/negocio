<?php
namespace App\Http\Controllers;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusinessController extends Controller {
    public function index(){ $businesses = Business::paginate(10); return view('business.index',compact('businesses')); }
    public function create(){ return view('business.create'); }
    public function store(Request $r){
        $data = $r->validate(['name'=>'required','address'=>'nullable','email'=>'nullable|email','phone'=>'nullable','logo'=>'nullable|image|max:2048']);
        if($r->hasFile('logo')) $data['logo']=$r->file('logo')->store('logos','public');
        Business::create($data);
        return redirect()->route('businesses.index')->with('success','Negocio creado.');
    }
    public function show(Business $business){ return view('business.show',compact('business')); }
    public function edit(Business $business){ return view('business.edit',compact('business')); }
    public function update(Request $r,Business $business){
        $data = $r->validate(['name'=>'required','address'=>'nullable','email'=>'nullable|email','phone'=>'nullable','logo'=>'nullable|image|max:2048']);
        if($r->hasFile('logo')){
            if($business->logo) Storage::disk('public')->delete($business->logo);
            $data['logo']=$r->file('logo')->store('logos','public');
        }
        $business->update($data);
        return redirect()->route('businesses.index')->with('success','Negocio actualizado.');
    }
    public function destroy(Business $business){
        if($business->logo) Storage::disk('public')->delete($business->logo);
        $business->delete();
        return redirect()->route('businesses.index')->with('success','Negocio eliminado.');
    }
}
