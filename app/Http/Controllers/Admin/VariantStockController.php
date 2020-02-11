<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Variation\StoreVariationRequest;
use App\Http\Resources\Product\ProductVariationsResource;
use App\Http\Resources\Product\StockResource;
use App\Models\ProductVariation;
use App\Models\Stock;
use Illuminate\Http\Request;

class VariantStockController extends Controller
{
    public function show(Request $request, ProductVariation $variation)
    {
        return new ProductVariationsResource($variation);
    }

    public function update(StoreVariationRequest $request, ProductVariation $variation)
    {
        $stock = new Stock;
        $stock->quantity = $request->quantity;
        $stock->variation()->associate($variation);
        $stock->save();

        return (new  StockResource(
            $stock
        ))
        ->additional([
            'success' => true,
            'message' => 'Stock success added',
        ]);
    }
}
