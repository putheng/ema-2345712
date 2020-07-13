<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
    	'user_id', 'name', 'address', 'phone', 'sponsor_id',
        'latitude', 'longitude', 'status', 'commission', 'approval', 'vat'
    ];

    public static function boot()
    {
    	parent::boot();

    	static::created(function($model){
    		$model->setID();
    	});
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function scopeByUuid($q, $uuid)
    {
        return $q->where('uuid', $uuid);
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

    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
