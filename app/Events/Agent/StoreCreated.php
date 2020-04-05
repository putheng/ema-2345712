<?php

namespace App\Events\Agent;

use App\Models\User;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class StoreCreated
{
    use Dispatchable, SerializesModels;

    public $user;

    public $request;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Request $request)
    {
        $this->user = $user;
        
        $this->request = $request;
    }
}
