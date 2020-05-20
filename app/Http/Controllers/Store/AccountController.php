<?php

namespace App\Http\Controllers\Store;

use App\Http\Resources\StoresResources;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use Storage;

class AccountController extends Controller
{
    public function index()
    {
    	return new StoresResources(
    		auth()->user()
    	);
    }

    public function store(Request $request)
    {
    	$user = auth()->user();

    	$user->update($request->only('name'));

    	$user->store()->update(
    		$request->only('address', 'phone', 'latitude', 'longitude')
    	);

    	if($request->photo){
            $this->uploadImage($request, $user->store);
        }

    	return (new StoresResources(
    		auth()->user()
    	))->additional([
    		'success' => true,
    		'message' => 'Profile updated'
    	]);
    }

    protected function uploadImage(Request $request, $store)
    {
        $file = $request->file('photo');

        if($file){
            $path = '/' . uniqid(true).time() . '.png';
            $imageFile = file_get_contents($file->getRealPath());
            Storage::disk('public_dir')->put('idphoto'. $path, $imageFile);

            $image = new Image;
            $image->url = $path;
            $image->user()->associate($request->user());
            
            $store->image()->save($image);
        }
    }
}
