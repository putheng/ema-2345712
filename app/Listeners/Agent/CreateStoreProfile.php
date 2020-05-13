<?php

namespace App\Listeners\Agent;

use App\Events\Agent\StoreCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateStoreProfile
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  StoreCreated  $event
     * @return void
     */
    public function handle(StoreCreated $event)
    {
        $user = $event->user;

        $user->update(['type' => 'store']);
        $user->store()->create([
            'name' => $event->request->store,
            'phone' => $event->request->phone,
            'sponsor_id' => $event->request->sponsor,
        ]);
    }
}
