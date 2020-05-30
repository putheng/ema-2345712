<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CityResource;
use App\Models\City;

class PlaceController extends Controller
{
	public function index()
	{
		return CityResource::collection(
    		City::get()
    	);
	}

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|min:3|max:255|unique:cities',
    		'country_id' => 'required|exists:countries,id'
    	]);

    	City::create($request->only('name', 'country_id'));

    	return CityResource::collection(
    		City::get()
    	)->additional([
    		'success' => true,
    		'message' => 'Place successfully created.'
    	]);
    }

    public function destroy(Request $request, City $city)
    {
        $city->delete();

        return CityResource::collection(
            City::get()
        )->additional([
            'success' => true,
            'message' => 'Place successfully created.'
        ]);
    }
}
