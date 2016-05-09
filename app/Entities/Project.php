<?php

namespace Projeto\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Project extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'subject_id',
		'title',
		'grade',
		'description',
		'due_date',
	];

	/**
	* Get the subject for this project
	*
	* @param 
	* return Subject::class
	*/
	public function subject()
	{
		return $this->belongsTo(Subject::class);
	}
	
	/**
	* Get the project files array for this project
	*
	* @param 
	* return ProjectFile::class
	*/
	public function files()
	{
		return $this->hasMany(ProjectFile::class);
	}
}
