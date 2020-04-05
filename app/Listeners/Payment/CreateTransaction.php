<?php

namespace App\Listeners\Payment;

use App\Events\Agent\TransferCreated;
use App\Models\Agent;
use App\Models\Transfer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateTransaction
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

        $transfer = new Transfer;

        $transfer->senderid()->associate(auth()->user());
        $transfer->user()->associate(auth()->user());
        $transfer->receiverid()->associate(Agent::byUuid($request->uuid)->first()->user);
        $transfer->amount = $request->amount_unformated;
        $transfer->mark = $request->mark;
        $transfer->fee = $request->fee;
        $transfer->currency = $request->currency;

        $transfer->save();
    }
}
