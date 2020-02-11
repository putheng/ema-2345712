<?php

namespace App\Listeners\Agent;

use App\Events\Agent\AgentCreated;
use App\Models\Agent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateAgentProfile
{
    /**
     * Handle the event.
     *
     * @param  AgentCreated  $event
     * @return void
     */
    public function handle(AgentCreated $event)
    {
        if($event->placement !== null){
            $this->ifNotNullPlacement($event);
        }else{
            $this->ifNullPlacement($event);
        }

    }

    protected function ifNullPlacement($event)
    {
        $parent = Agent::where('user_id', auth()->id())->first();

        Agent::create([
            'user_id' => $event->agent->id,
            'parent_id' => $parent->id
        ]);
    }

    protected function ifNotNullPlacement($event)
    {
        Agent::create([
            'user_id' => $event->agent->id,
            'parent_id' => $event->placement
        ]);
    }
}
