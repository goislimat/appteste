<?php

namespace Projeto\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Subject extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'course_id',
		'name',
		'semester',
	];

	/**
	* Get the course attached to the subject
	* 
	* return Course::class
	*/
	public function course()
	{
		return $this->belongsTo(Course::class);
	}
    
    /**
    * Get the users array for each subject
    *
    * return User::class
    */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_subjects', 'subject_id', 'user_id')->withPivot('year_semester')->orderBy('year_semester');
    }
	
	/**
	* Get the projects array for each subject
	*
	* @param 
	* return Project::class
	*/
	public function projects()
	{
		return $this->hasMany(Project::class);
	}
}
