<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
    	return view('home.home');
    }

    public function cart()
    {
        return view('home.cart');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function about()
    {
        return view('home.about');
    }

    public function redirect()
    {
        // return redirect()->route('index');
    }

    public function stores()
    {
        $stores = Store::get();

        return view('home.stores', compact('stores'));
    }

    public function currency(Request $request)
    {
        $array = ['THB', 'KHR', 'USD'];

        if(in_array($request->c, $array)){
            if(auth()->check()){
                auth()->user()->update(['currency' => $request->c]);

                return back();
            }

            session()->put('currency', $request->c);

            return back();
        }

        return back();
    }

}
