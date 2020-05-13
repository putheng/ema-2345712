<?php

namespace App\Listeners\Payment;

use App\Events\Agent\TransferCreated;
use App\Models\Agent;
use App\Models\Store;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TransferFund
{
    /**
     * Handle the event.
     *
     * @param  TransferCreated  $event
     * @return void
     */
    public function handle(TransferCreated $event)
    {
        $request = $event->request;

        $amount = $request->amount;

        if(strpos($request->uuid, 'ST') !== false){
            Store::byUuid($request->uuid)
            ->first()
            ->user()
            ->increment('balance', $amount);
        } else if(strpos($request->uuid, 'EMA') !== false){
            Agent::byUuid($request->uuid)
            ->first()
            ->user()
            ->increment('balance', $amount);
        }
            
    }
}
