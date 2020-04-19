<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    protected $fillable = [
    	'body'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function ticket()
    {
    	return $this->belongsTo(Ticket::class);
    }
}
