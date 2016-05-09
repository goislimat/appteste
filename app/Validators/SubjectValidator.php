<?php

namespace Projeto\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class SubjectValidator extends LaravelValidator {

    protected $rules = [
        'name' => 'required|min:5',
        'semester' => 'required'
   ];

}