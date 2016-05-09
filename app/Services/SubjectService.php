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
    
    /**
    * Does the procedure to store a new subject
    *
    * @param array $data
    * return array
    */
    public function store(array $data)
    {
        return $this->repository->create($data);
    }
    
    /**
    * Does the procedure to update a subject
    *
    * @param array $data
    * return array
    */
    public function update(array $data, $id)
    {
        return $this->repository->update($data, $id);
    }
}