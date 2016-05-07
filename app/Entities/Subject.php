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

}
