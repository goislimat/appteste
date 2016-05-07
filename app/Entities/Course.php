<?php

namespace Projeto\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Course extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'name',
		'type',
		'abbr',
	];

	/**
	* Get the relationship users array
	*
	* return User::class
	*/
	public function users()
	{
		return $this->hasMany(User::class);
	}
	
	/**
	* Get the relationship subjects array
	*
	* return Subject::class
	*/
	public function subjects()
	{
		return $this->hasMany(Subject::class);
	}
}
