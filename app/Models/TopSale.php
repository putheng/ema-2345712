<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopSale extends Model
{
	protected $fillable = ['amount'];

	public static function boot()
	{
		parent::boot();

		static::updating(function($model){
			$model->increment('counting');
		});
	}

    public function scopeAddTopSale($q, $amount)
    {
    	$model = $q->where('isCounting', true)->first();

    	if($model == null){
    		static::create([
    			'amount' => $amount
    		]);
    	}

    	$model->increment('amount', $amount);

    	return $model;
    }

    public function track()
    {
        return $this->morphMany(Track::class, 'trackable');
    }
}
