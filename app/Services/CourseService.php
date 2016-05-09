<?php

namespace Projeto\Services;

use Projeto\Repositories\CourseRepository;

class CourseService
{
    /**
    * @var CourseRepository
    */
    private $repository;

    /**
    * CourseService constructor.
    * @param CourseRepository $repository
    */
    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
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