<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $fillable = [
		'url'
	];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function file()
    {
        return public_path('/uploads/avatar' . $this->path());
    }

    public function path()
    {
    	return $this->url;
    }

    public function avatar()
    {
        return url('uploads/avatar'. $this->url);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
