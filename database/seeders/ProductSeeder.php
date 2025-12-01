<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder {
    public function run(): void {
        $cat = Category::first();
        Product::create(['sku'=>'P001','name'=>'Producto Demo','category_id'=>$cat->id,'description'=>'Demo','price'=>100,'stock'=>50]);
    }
}
