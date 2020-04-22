<?php

namespace App\Listeners\Payment;

use App\Events\Agent\TransferCreated;
use App\Models\Agent;
use App\Models\Track;
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

        $sender = auth()->user();
        $receiver = Agent::byUuid($request->uuid)->first()->user;

        $transfer = new Transfer;

        $transfer->senderid()->associate($sender);
        $transfer->user()->associate($sender);
        $transfer->receiverid()->associate($receiver);
        $transfer->amount = $request->amount_unformated;
        $transfer->mark = $request->mark;
        $transfer->fee = $request->fee;
        $transfer->currency = $request->currency;

        $transfer->save();

        $this->createAddTransfer($transfer, $receiver);
        $this->createRemoveTransfer($transfer, $sender);
        
    }

    protected function createAddTransfer($transfer, $user)
    {
        $track = new Track;
        $track->value = $transfer->amount;
        $track->symbol = '+';
        $track->user()->associate($user);

        $transfer->track()->save($track);
    }

    protected function createRemoveTransfer($transfer, $user)
    {
        $track = new Track;
        $track->value = $transfer->amount;
        $track->symbol = '-';
        $track->user()->associate($user);

        $transfer->track()->save($track);
    }
}
