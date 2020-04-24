<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{ 
	protected $fillable = [
		'uuid', 'symbol', 'value'
	];

	public static function boot()
	{
		parent::boot();

		static::created(function($model){
			$model->update(['uuid' => 'EMAT00000'. $model->id]);
		});
	}

	public function scopeLatest($q)
	{
		return $q->orderBy('id', 'desc');
	}

    public function imageable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
