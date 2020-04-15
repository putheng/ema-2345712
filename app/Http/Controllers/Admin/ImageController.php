<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function destroy(Request $request)
    {
    	$image = Image::find($request->id);

    	$image->delete();

    	Storage::disk('public_dir')->delete('products/'. $image->url);
    }
}
