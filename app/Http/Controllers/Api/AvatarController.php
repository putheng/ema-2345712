<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\StoreAvatarFormRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function store(StoreAvatarFormRequest $request)
    {
        $user = $request->user();

        $path = '/' . uniqid(true).time() . '.png';

        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $imageFile = file_get_contents($file->getRealPath());

        
        Storage::disk('public_dir')->put('avatar'. $path, $imageFile);

        $avatar = $request->user()->image();

        if($avatar->count()){
            if(file_exists($avatar->first()->file())){
                unlink($avatar->first()->file());
            }
            
        	$avatar->delete();
        }

        $image = new Image;
        $image->url = $path;
        $image->user()->associate($user);
        $user->image()->save($image);
        
        return response([
            'data' => [
                'id' => $image->id,
                'path' => $image->path(),
            ]
        ], 200);
    }
}
