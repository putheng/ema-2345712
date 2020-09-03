<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
    	$sale = auth()->user()->sales();

    	$sales = $sale->get()->sum('pivot.price');

    	// $month = $sale->thisMonth()->get();

        // $month = $sale->wherePivot('created_at', '>=', date('Y-m-d'));

    	$data = [
    		'data' => [
	    		'lifetime'=> '$'. number_format($sales, 2),
	    		'thisMonth'=> '$'. number_format($sales, 2),
	    		'balance' => currency_format(auth()->user()->balance),
	    		'series' => [
	    			['name' => 'Sales',
	    			// 'data' => $month->pluck('quantity')
                    ]
	    		]
	    	]
    	];
    	return response()->json($data);
    }
}
