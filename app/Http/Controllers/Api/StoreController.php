<?php

namespace App\Http\Controllers\Api;

use App\Events\Agent\StoreCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFormRequest;
use App\Http\Resources\StoresResources;
use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StoresResources::collection(
            User::with('store')
                ->orderBy('id', 'desc')
                ->isStore()
                ->paginate(200)
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormRequest $request)
    {
        $user = User::create($request->only('name', 'email', 'password'));

        $user->assignRole('store');

        event(new StoreCreated($user, $request));

        return response()->json([
            'success' => true,
            'message' => 'Store created successfuly'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return response()->json([
            'vat' => (boolean) optional(auth()->user()->store)->vat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        if(isset($request->status)){
            $store->update($request->only('status'));
        }

        if(isset($request->vat)){
            $store->update($request->only('vat'));
        }

        return StoresResources::collection(
            User::with('store')
                ->orderBy('id', 'desc')
                ->isStore()
                ->paginate(200)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
