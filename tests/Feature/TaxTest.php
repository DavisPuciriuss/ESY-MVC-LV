<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Product;
use Tests\TestCase;

class TaxTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_tax_calculation(): void
    {
        $product = Product::create([
            'name' => 'test',
            'count' => 2,
            'price' => 1,
        ]);

        $this->assertEquals(2 * 1 * (1 + config('app.tax')), $product->getTaxPriceAttribute());
    }
}
