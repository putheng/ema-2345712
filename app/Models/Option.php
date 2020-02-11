<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
    	'value',
    	'type',
    	'enable'
    ];

    public function scopeType($q, $type)
    {
    	return $q->where('type', $type)->first();
    }
}
