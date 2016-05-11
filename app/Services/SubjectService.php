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
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $subject = $this->repository->find($id);

        $users = array();
        $semester = date('Y') . '/' . ((date('m') > 6) ? '2': '1');

        foreach($subject->users as $user)
        {
            if($user->pivot->year_semester == $semester && $user->type == 1)
            {
                array_push($users, $user);
            }
        }

        $subject->users = $users;

        return $subject;
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->repository->update($data, $id);
    }

    /**
     * Return the collection of students for a given subject
     *
     * @param $id
     * @param $type
     * @return mixed
     */
    public function all($id, $type)
    {
        return $this->searchForUser($id, $type);
    }

    /**
     * Search for a user given his type
     *
     * @param $id
     * @param $type
     * @return mixed
     */
    private function searchForUser($id, $type)
    {
        $subject = $this->repository->find($id);

        $users = array();

        foreach($subject->users as $user)
        {
            if($user->type == $type)
            {
                array_push($users, $user);
            }
        }

        $subject->users = $users;
        $subject['user_type'] = $type;

        return $subject;
    }
}