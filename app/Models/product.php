<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;
    protected $fillable = ['sku','name','category_id','description','price','stock','image'];

    public function category(){ return $this->belongsTo(Category::class); }
    public function items(){ return $this->hasMany(\App\Models\SaleItem::class); }
}
