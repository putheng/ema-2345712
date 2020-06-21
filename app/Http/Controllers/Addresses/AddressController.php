<?php

namespace App\Http\Controllers\Addresses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Addresses\AddressStoreRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        return AddressResource::collection(
            $request->user()->addresses
        );
    }

    public function store(AddressStoreRequest $request)
    {
        $address = Address::make($request->only([
            'name', 'address', 'city_id', 'phone', 'country_id', 'default'
        ]));

        $request->user()->addresses()->save($address);

        return new AddressResource(
            $address
        );
    }

    public function destroy(Request $request, Address $address)
    {
        $address->delete();

        $addresses = $request->user()->addresses()->get();

        $this->setDefaultAddress($addresses);

        return AddressResource::collection(
            $addresses
        );
    }

    protected function setDefaultAddress($addresses)
    {
        if($addresses->where('default', true)->count() == 0){
            $addresses->first()->update(['default' => true]);
        }
    }
}
