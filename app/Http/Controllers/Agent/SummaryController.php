<?php

namespace App\Http\Controllers\Agent;

use App\Http\Resources\Society\AccountSummary;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function index(Request $request)
    {
    	return new AccountSummary($request->user());
    }
}
