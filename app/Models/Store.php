<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
    	'user_id', 'name', 'address', 'phone', 'latitude', 'longitude', 'status'
    ];

    public static function boot()
    {
    	parent::boot();

    	static::created(function($model){
    		$model->setID();
    	});
    }

    protected function setID()
    {
        $uuid = substr('000000', strlen($this->id));

        $this->uuid = 'ST'. $uuid . $this->id;
        $this->save();
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
