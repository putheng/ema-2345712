<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\PrivateUserResource;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
	use RegistersUsers;

    public function store(RegisterRequest $request)
    {
        $user = User::create($request->only('phone', 'name', 'password'));

        $user->customer()->create([
            'phone' => $request->phone,
            'gender' => $request->gender
        ]);

        $this->guard()->login($user);

        $user->update(['type' => 'dashboard']);
        $user->assignRole('customer');

        $this->verify($user);

        return (new PrivateUserResource($user))
        	->additional([
        		'success' => true
        	]);
    }

    public function verify($user)
    {
        $phone = $user->customer->phone;

        $code = rand(10000, 90000);

        $client = new Client([
            'base_uri' => 'https://tool.plasgate.com:11041/cgi-bin/',
            'verify' => false,
        ]);

        try{
            $response = $client->request('POST', 'sendsms', [
                'form_params' => [
                    'gw-username' => 'e-marketkhapi',
                    'gw-password' => '&jjR0xS!',
                    'gw-from' => 'E-Market',
                    'gw-to' => '855'. $phone,
                    'gw-text' => $code .' is your E-Market verification code for register.'
                ]
            ]);
        }catch(\Exception $e){

        }
    }
}
