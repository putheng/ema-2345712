<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
    	'name', 'address', 'phone', 'description', 'status'
    ];

    public static function boot()
    {
    	parent::boot();

    	static::created(function($model){
    		$model->setID();
    	});
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    protected function setID()
    {
        $uuid = substr('000000', strlen($this->id));

        $this->uuid = 'SP'. $uuid . $this->id;
        $this->save();
    }
}
