<?php
namespace Tests\Feature;
use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductIndexTest extends TestCase {
    use RefreshDatabase;
    public function test_products_index_shows(): void {
        Product::factory()->count(3)->create();
        $this->get(route('products.index'))->assertStatus(200);
    }
}
