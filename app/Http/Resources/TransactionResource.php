<?php

namespace App\Http\Resources;

use App\Models\Store;
use App\Models\Agent;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'username' => $this->getUser($request)->user->name,
            'uuid' => $request->receiver,
            'fee' => '0.00',
            'currency' => 'USD',
            'amount_unformated' => $request->amount,
            'amount' => '$'. number_format($request->amount, 2)
        ];
    }

    protected function getUser($request)
    {
        if(strpos($request->receiver, 'ST') !== false){

            return Store::byUuid($request->receiver)
            ->first();
            
        } else if(strpos($request->receiver, 'EMA') !== false){
            return Agent::byUuid($request->receiver)
            ->first();
        }if(strpos($request->uuid, 'ST') !== false){

            return Store::byUuid($request->uuid)
            ->first();
            
        }
    }
}
