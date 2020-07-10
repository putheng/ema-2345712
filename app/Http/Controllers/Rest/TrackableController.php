<?php

namespace App\Http\Controllers\Rest;

use App\Http\Resources\Api\TrackResources;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrackableController extends Controller
{
    public function index(Request $request)
    {
    	$tracks = auth('api')->user()->tracks;

    	return TrackResources::collection($tracks);
    }
}
