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
    	'parent_id'
    ];

    public static function boot()
    {
    	parent::boot();

    	static::creating(function($model){
    		$model->setIDParent();
    	});

    	static::created(function($model){
    		$model->increment_child();

    		$model->setLevel();

    		$model->setIDParent();

	    });
    }

    protected function setIDParent()
    {
    	if($this->parentExceedsChilLimit()){
    		$this->parent_id = $this->getChildLessChil()->id;
    	}
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

    public function scopeIsPa($builder)
    {
        return $builder->whereNull('parent_id');
    }

    public function pa()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function kon()
    {
        return $this->hasMany(self::class, 'parent_id')->latest();
    }
}