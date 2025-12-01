<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {
    use HasFactory;
    protected $fillable = ['sale_id','number','issued_at','amount','pdf_path'];
    public function sale(){ return $this->belongsTo(Sale::class); }
}
