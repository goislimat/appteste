<?php

namespace Projeto\Services;

use Projeto\Repositories\CourseRepository;
use Projeto\Validators\CourseValidator;

class CourseService
{
    /**
    * @var CourseRepository
    */
    private $repository;
    /**
    * @var CourseValidator
    */
    private $validator;

    /**
    * CourseService constructor.
    * @param CourseRepository $repository
    * @param CourseValidator $validator
    */
    public function __construct(CourseRepository $repository, CourseValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
    
    /**
    * Does the procedure to store a new course
    *
    * @param array $data
    * return array
    */
    public function store(array $data)
    {
        return $this->repository->create($data);
    }
    
    /**
    * Does the procedure to update a course
    *
    * @param array $data
    * return array
    */
    public function update(array $data, $id)
    {
        return $this->repository->update($data, $id);
    }
}