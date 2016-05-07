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
}