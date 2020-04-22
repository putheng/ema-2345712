<?php

namespace App\Models;

use App\Models\{User, Transaction, Track};
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
    	'sender', 'receiver', 'amount', 'fee', 'mark'
    ];

    public static function boot()
    {
        parent::boot();

        static::created(function($model){
            $model->uuid = 'EMAT'. substr('00000000', strlen($model->id)) . $model->id;
            $model->save();
        });
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function track()
    {
        return $this->morphMany(Track::class, 'trackable');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'order_id');
    }

    public function senderid()
    {
    	return $this->belongsTo(User::class, 'sender');
    }

    public function receiverid()
    {
    	return $this->belongsTo(User::class, 'receiver');
    }
}
