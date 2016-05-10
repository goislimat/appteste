<?php

namespace Projeto\Services;

use Projeto\Repositories\SubjectRepository;
use Projeto\Validators\SubjectValidator;

class SubjectService
{
    /**
    * @var SubjectRepository
    */
    private $repository;
    /**
    * @var SubjectValidator
    */
    private $validator;

    /**
    * SubjectService constructor.
    * @param SubjectRepository $repository
    * @param SubjectValidator $validator
    */
    public function __construct(SubjectRepository $repository, SubjectValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
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