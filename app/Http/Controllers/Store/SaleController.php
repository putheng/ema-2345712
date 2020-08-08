<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
    	$sale = auth()->user()->sales();

    	$sales = currency_format($sale->get()->sum('amount'));

    	$month = $sale->thisMonth()->get();

    	$data = [
    		'data' => [
	    		'lifetime'=> $sales,
	    		'thisMonth'=> currency_format($month->sum('amount')),
	    		'balance' => currency_format(auth()->user()->balance),
	    		'series' => [
	    			['name' => 'Sales',
	    			'data' => $month->pluck('quantity')]
	    		]
	    	]
    	];
    	return response()->json($data);
    }
}
