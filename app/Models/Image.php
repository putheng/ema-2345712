<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $fillable = [
		'url'
	];

    public function getNameAttribute()
    {
        return "ID{$this->id}ID";
    }

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
        return secure_asset('uploads/avatar'. $this->url);
    }

    public function product()
    {
        // return secure_asset('http://emarketasia.com/uploads/products'. $this->url);
        return 'http://emarketasia.com/uploads/products'. $this->url;
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
