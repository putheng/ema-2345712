<?php

namespace App\Listeners\Payment;

use App\Events\Agent\TransferCreated;
use App\Models\Agent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RemoveFund
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

        $user->decrement('balance', $request->amount);
    }
}
