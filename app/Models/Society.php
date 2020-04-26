<?php

namespace App\Models;

use App\Models\User;
use App\Models\IDType;
use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    protected $fillable = [
    	'first', 'last', 'id_code', 'id_code_type', 'gender', 'age', 'dob', 'status', 'phone'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function id_type()
    {
    	return $this->belongsTo(IDType::class, 'id_code_type');
    }
}