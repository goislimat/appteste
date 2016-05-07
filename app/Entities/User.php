<?php

namespace Projeto\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user', 'type', 'ingress_year', 'email', 'password', 'course_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
    * Get the course attached to the user_error
    *
    * return Course::class
    */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
