<?php

namespace Projeto\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator {

    protected $rules = [
        'title' => 'required|min:4',
        'due_date' => 'required|date'
   ];

}