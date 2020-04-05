<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index(Request $request)
    {
    	$products = Product::with(['variations.stock'])
    		->withScopes($this->scopes())
    		->paginate(10);
    }

    protected function scopes()
    {
        return [
            'category' => new CategoryScope()
        ];
    }
}
