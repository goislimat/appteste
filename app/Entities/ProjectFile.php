<?php

namespace Projeto\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProjectFile extends Model implements Transformable
{
    use TransformableTrait;
	
	protected $table = "project_files";

    protected $fillable = [
		'project_id',
		'filename',
		'mime',
		'original_filename'
	];

	/**
	 * Get the project for this project file
	 *
	 * @param
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function project()
	{
		return $this->belongsTo(Project::class);
	}

	/**
	 * Get the users array for this project file
	 *
	 * @param
	 * @return $this
	 */
	public function users()
	{
		return $this->belongsToMany(User::class, 'submissions', 'file_id', 'user_id')->withPivot('protocol_number');
	}
}
