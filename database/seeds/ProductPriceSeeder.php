<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Cart\Money;
use App\Models\ProductVariation;

class ProductPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = ProductVariation::where('currency', 'USD')->get();

        $products->each(function($product){
        	$price = (new Money($product->commission))->priceformatt();

        	$new_price = str_replace('$', '', $price);

        	$new_price = str_replace(',', '', $new_price);

        	// $new_price = ($new_price / 4100);

        	// $new_price = number_format($new_price, 2);

        	// ddump($price);

        	$product->update(['commission_2' => $new_price]);
        });
    }
}
