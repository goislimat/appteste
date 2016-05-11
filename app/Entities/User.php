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
        'name', 'username', 'type', 'ingress_year', 'email', 'password', 'course_id'
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
    
    /**
    * Get the subjects array for each user
    *
    * return Subject::class
    */
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'user_subjects', 'user_id', 'subject_id')->withPivot('year_semester')->orderBy('year_semester', 'desc');
    }
    
    /**
	* Get the files array for this user
	*
	* @param 
	* return ProjectFile::class
	*/
	public function files()
	{
		return $this->belongsToMany(ProjectFile::class, 'submissions', 'user_id', 'file_id')->withPivot('protocol_number');
	}
}
