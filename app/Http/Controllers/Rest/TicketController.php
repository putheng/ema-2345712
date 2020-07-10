<?php

namespace App\Http\Controllers\Rest;

use App\Http\Resources\Api\{TicketResources, SingleTicketResources};
use App\Http\Requests\Api\{StoreTicketRequest, StoreTicketReplyRequest};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Ticket, TicketReply};

class TicketController extends Controller
{
	public function index(Request $request)
	{
		return TicketResources::collection(
    		auth('api')->user()->tickets()->latest()->get()
    	);
	}

    public function show(Request $request, Ticket $ticket)
    {
        return new SingleTicketResources($ticket);
    }

    public function store(StoreTicketRequest $request)
    {
    	$ticket = auth('api')->user()->tickets()
    		->create($request->only('subject', 'type', 'priority', 'describe'));

    	return TicketResources::collection(
    		auth('api')->user()->tickets()->latest()->get()
    	)->additional([
    		'success' => true
    	]);
    }

    public function update(StoreTicketReplyRequest $request, Ticket $ticket)
    {
        $reply = new TicketReply;

        $reply->user()->associate(auth('api')->user());
        $reply->ticket()->associate($ticket);
        $reply->body = $request->message;
        $reply->save();

        if($request->close){
            $ticket->update(['status' => 'close']);
        }

        return (new SingleTicketResources($ticket))
            ->additional([
                'success' => true            
            ]);
    }
}
