<?php

namespace App\Events\Agent;

use App\Models\User;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AgentCreated
{
    use Dispatchable, SerializesModels;

    public $agent;

    public $placement;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $agent, $placement = null)
    {
        $this->agent = $agent;
        $this->placement = $placement;
    }

}
