<?php

namespace App\Models;

use App\Models\User;
use App\Models\IDType;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    protected $fillable = [
    	'first', 'last', 'id_code', 'id_code_type', 
        'gender', 'age', 'dob', 'status', 'phone', 'approval'
    ];

    public function getGenderAttribute($value)
    {
        if(empty($value)){
            return 'Not set';
        }
        if($value == 1){
            return 'Male';
        }

        if($value == 2){
            return 'Female';
        }
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function id_type()
    {
    	return $this->belongsTo(IDType::class, 'id_code_type');
    }

    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
