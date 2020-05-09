<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
    	$sale = auth()->user()->sales();

    	$sales = get_currency($sale->get()->sum('amount'))->amount();

    	$month = $sale->thisMonth()->get();

    	$data = [
    		'data' => [
	    		'lifetime'=> $sales,
	    		'thisMonth'=> get_currency($month->sum('amount'))->amount(),
	    		'balance' => get_currency(auth()->user()->balance)->amount(),
	    		'series' => [
	    			['name' => 'Sales',
	    			'data' => $month->pluck('quantity')]
	    		]
	    	]
    	];
    	return response()->json($data);
    }
}
