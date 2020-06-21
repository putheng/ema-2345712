<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IncommingController extends Controller
{
    public function store(Request $request)
    {
    	file_put_contents('log', json_encode($request->all()));
    }

    public function content(Request $request)
    {
    	$url = $request->url;

    	return redirect($url);
    }

    public function continue(Request $request)
    {

    }
}
