<?php

namespace App\Http\Controllers\Agent;

use App\Http\Resources\Auth\SocietyResources;
use App\Http\Requests\StoreSocietyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Society;
use App\Models\Image;
use Storage;

class AccountController extends Controller
{
    public function index(Request $request)
    {
    	return new SocietyResources(
    		$request->user()->society
    	);
    }

    public function store(StoreSocietyRequest $request)
    {

    	$request->user()->society()->update([
    		'first' => $request->first_name,
    		'last' => $request->last_name,
    		'id_code' => $request->id_number,
    		'id_code_type' => $request->id_type,
    		'dob' => $request->dob,
    		'gender' => $request->gender,
    		'age' => $request->age,
    		'phone' => $request->phone,
            'status' => 'Pending',
    		'approval' => 'waiting',
    	]);

        if($request->photo){
            $this->uploadImage($request, $request->user()->society);
        }

    	return (new SocietyResources(
    		$request->user()->society
    	))->additional([
            'success' => true,
            'message' => 'Profile updated'
        ]);
    }

    protected function uploadImage(Request $request, $society)
    {
        $file = $request->file('photo');

        if($file){
            $path = '/' . uniqid(true).time() . '.png';
            $imageFile = file_get_contents($file->getRealPath());
            Storage::disk('public_dir')->put('idphoto'. $path, $imageFile);

            $image = new Image;
            $image->url = $path;
            $image->user()->associate($request->user());
            $society->image()->save($image);
        }
    }
}
