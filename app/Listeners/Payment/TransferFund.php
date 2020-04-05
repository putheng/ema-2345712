<?php

namespace App\Listeners\Payment;

use App\Events\Agent\TransferCreated;
use App\Models\Agent;
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

        Agent::byUuid($request->uuid)
            ->first()
            ->user()
            ->increment('balance', $request->amount_unformated);
    }
}
