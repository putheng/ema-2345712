<?php

namespace App\Http\Controllers\Addresses;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
	public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        return CityResource::collection(
            City::get()
        );
    }
}
