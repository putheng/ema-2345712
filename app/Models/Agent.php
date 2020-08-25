<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Agent extends Model
{
    use NodeTrait;

    protected $fillable = [
    	'user_id',
    	'parent_id',
        'sponsor_id',
        'level',
        'status',
    ];

    public static function boot()
    {
    	parent::boot();

    	static::created(function($model){
    		$model->setID();

            $data = [
                'id_code_type' => 1,
                'status' => 'Pending',
                'gender' => request()->gender
            ];

            if(request()->phone){
                $data = array_merge($data, ['phone' => request()->phone]);
            }
            
            $model->user->society()->create($data);
	    });
    }

    protected function setID()
    {
        $uuid = substr('000000', strlen($this->id));

        $this->uuid = 'EMA'. $uuid . $this->id;
        $this->save();
    }

    protected function getChildLessChil()
    {
    	return $this->parent->children->sortBy('child_count')->first();
    }

    protected function setLevel()
    {
    	$this->level = $this->parent->level + 1;
		$this->save();
    }

    protected function increment_child()
    {
    	return $this->parent->increment('child_count');
    }

    protected function parentExceedsChilLimit()
    {
    	return $this->parent->child_count == get_level($this->parent->level)->value;
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function scopePlacements($query)
    {
        return $query->where();
    }

    public function scopeIsPa($builder)
    {
        return $builder->whereNull('parent_id');
    }

    public function scopeByUuid($q, $uuid)
    {
        return $q->where('uuid', $uuid);
    }

    public function parentx()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function kon()
    {
        return $this->hasMany(self::class, 'parent_id')->latest();
    }
}