<?php

namespace App\Models;

use App\Models\{User, Priority, TicketType};
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
    	'subject', 'priority', 'type', 'describe', 'describe', 'status'
    ];

    public function scopeLatest($q)
    {
        return $q->orderBy('updated_at', 'desc');
    }

    public static function boot()
    {
    	parent::boot();

    	static::creating(function($model){
    		$model->status = 'open';
    	});
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function children()
    {
        return $this->hasMany(TicketReply::class);
    }

    public function gtype()
    {
    	return $this->belongsTo(TicketType::class, 'type');
    }

    public function gpriority()
    {
    	return $this->belongsTo(Priority::class, 'priority');
    }
}
