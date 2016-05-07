<?php

namespace Projeto\Services;

use Projeto\Repositories\UserRepository;

class UserService
{
    /**
    * @var UserRepository
    */
    private $repository;

    /**
    * UserService constructor.
    * @param UserRepository $repository
    */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
    * Run all the tasks before store a new User
    *
    * @param array $user
    * return User
    */
    public function store(array $user)
    {
        $password = str_random(8);
        $user['password'] = $password;
        
        $user = $this->repository->create($user);
        
        $user->user = $this->getPrefix($user->type) . $user->ingress_year . str_pad($user->id, 6, '0', STR_PAD_LEFT);
        
        $user['remember_token'] = str_random(10);
        $user->save();
        
        //enviar um email para $user-email com $user->user e $password
        //dispara mensagem de sucesso
        return $user;
    }
    
    /**
    * Return a user prefix
    *
    * @param $type
    * return string
    */
    private function getPrefix($type)
    {
        if($type == 1)
        {
            //find sigla
            return "ADS";
        } 
        else if($type == 2)
        {
            return "PROF";
        }
        else
        {
            return "ADMIN";
        }
    }
}