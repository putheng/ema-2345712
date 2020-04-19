<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin()
    {
        return view('admin.index');
    }

    public function home()
    {
        return view('home.product');
    }

    public function store()
    {
        return view('store.index');
    }

    public function society()
    {
        return view('society.index');
    }

    public function auth()
    {
        return view('auth.index');
    }

    public function index()
    {
    	return view('home.index');
    }

    public function supplier()
    {
        return view('supplier.index');
    }

    public function dashboard()
    {
        return view('dashboard.index');
    }
}
