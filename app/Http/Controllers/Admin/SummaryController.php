<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\AdminSummaryResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function index()
    {
    	return new AdminSummaryResource(auth()->user());
    }
}
