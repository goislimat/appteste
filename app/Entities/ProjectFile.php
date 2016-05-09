<?php

namespace Projeto\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProjectFile extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'project_id',
		'name',
		'extension',
	];

	/**
	* Get the project for this project file
	*
	* @param 
	* return Project::class
	*/
	public function project()
	{
		return $this->belongsTo(Project::class);
	}
}
