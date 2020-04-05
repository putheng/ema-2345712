<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
    	'user_id', 'name', 'address', 'phone', 'latitude', 'longitude'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
