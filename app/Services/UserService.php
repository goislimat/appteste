<?php

namespace Projeto\Services;

use Projeto\Repositories\UserRepository;
use Projeto\Repositories\CourseRepository;
use Projeto\Validators\UserValidator;

class UserService
{
    /**
    * @var UserRepository
    */
    private $repository;
    /**
    * @var CourseRepository
    */
    private $courseRepository;
    /**
    * @var UserValidator
    */
    private $validator;

    /**
    * UserService constructor.
    * @param UserRepository $repository
    * @param CourseRepository $courseRepository
    * @param UserValidator $validator
    */
    public function __construct(UserRepository $repository, CourseRepository $courseRepository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->courseRepository = $courseRepository;
        $this->validator = $validator;
    }

    /**
     * Run all the tasks before store a new User
     *
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        $password = str_random(8);
        $data['password'] = $password;
        
        if($data['course_id'] ==  '')
        {
            $data['course_id'] = null;
        } 
        
        $user = $this->repository->create($data);
        
        $user->username = $this->getPrefix($data) . $user->ingress_year . str_pad($user->id, 6, '0', STR_PAD_LEFT);
        
        $user['remember_token'] = str_random(10);
        $user->save();
        
        //enviar um email para $user-email com $user->username e $password
        //dispara mensagem de sucesso
        return $user;
    }

    /**
     * Run all the tasks before update a new User
     *
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        if($data['course_id'] ==  '')
        {
            $data['course_id'] = null;
        }
        
        $data['user'] = $this->getPrefix($data) . $data['ingress_year'] . str_pad($id, 6, '0', STR_PAD_LEFT);
        
        $user = $this->repository->update($data, $id);
        
        //dispara mensagem de sucesso
        return $user;
    }

    /**
     * Return a user prefix
     *
     * @param $data
     * @return string
     * @internal param $type return string* return string
     */
    private function getPrefix($data)
    {
        if($data['type'] == 1)
        {            
            return $this->courseRepository->find($data['course_id'])->abbr;
        } 
        else if($data['type'] == 2)
        {
            return "PROF";
        }
        else
        {
            return "ADMIN";
        }
    }
}