<?php

namespace Projeto\Services;

use Projeto\Repositories\UserRepository;

class UserService
{
    private $repository;
    
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
}