<?php

namespace Projeto\Services;

use Projeto\Repositories\SubjectRepository;

class SubjectService
{
    /**
    * @var SubjectRepository
    */
    private $repository;

    /**
    * SubjectService constructor.
    * @param SubjectRepository $repository
    */
    public function __construct(SubjectRepository $repository)
    {
        $this->repository = $repository;
    }
}