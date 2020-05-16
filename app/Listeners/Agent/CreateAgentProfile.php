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
        $parent = Agent::where('uuid', $event->sponsor)->first();
        $parent->increment('child_count');

        $agent = Agent::create([
            'user_id' => $event->agent->id,
            'sponsor_id' => $parent->id,
            'parent_id' => $parent->id,
            'level' => ($parent->level + 1)
        ]);
    }

    protected function ifNotNullPlacement($event)
    {
        $sponsor = Agent::where('uuid', $event->sponsor)->first();

        $parent = Agent::where('uuid', $event->placement)->first();
        $parent->increment('child_count');

        $agent = Agent::create([
            'user_id' => $event->agent->id,
            'sponsor_id' => $sponsor->id,
            'parent_id' => $parent->id,
            'level' => ($parent->level + 1)
        ]);
    }
}
