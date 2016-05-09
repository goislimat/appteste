<?php

namespace Projeto\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CourseValidator extends LaravelValidator {

    protected $rules = [
        'name' => 'required|min:5',
        'type' => 'required',
        'abbr' => 'required|min:2|max:5'
   ];

}