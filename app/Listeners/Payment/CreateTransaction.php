<?php

namespace App\Listeners\Payment;

use App\Events\Agent\TransferCreated;
use App\Models\Agent;
use App\Models\Track;
use App\Models\Store;
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
        $user = auth()->user();

        $sender = $user;

        $receiver = $this->getUser($request)->user;

        $transfer = new Transfer;

        $transfer->senderid()->associate($sender);
        $transfer->user()->associate($sender);
        $transfer->receiverid()->associate($receiver);
        $transfer->amount = $request->amount;
        $transfer->mark = $request->mark;
        $transfer->fee = $request->fee;
        $transfer->currency = $sender->currency;

        $transfer->save();

        $this->createAddTransfer($transfer, $receiver);
        $this->createRemoveTransfer($transfer, $sender);
        
    }

    protected function getUser($request)
    {
        if(strpos($request->uuid, 'ST') !== false){

            return Store::byUuid($request->uuid)
            ->first();
            
        } else if(strpos($request->uuid, 'EMA') !== false){
            return Agent::byUuid($request->uuid)
            ->first();
        }
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
