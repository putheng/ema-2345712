<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\TrackResources;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrackableController extends Controller
{
    public function index(Request $request)
    {
    	$tracks = $request->user()->tracks;

    	return TrackResources::collection($tracks);
    }
}
