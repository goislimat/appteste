<?php
/**
 * Created by PhpStorm.
 * User: goisl
 * Date: 10/05/2016
 * Time: 22:17
 */

namespace Projeto\Services;


use Projeto\Repositories\SubjectRepository;
use Projeto\Repositories\UserRepository;

class EnrollService
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var SubjectRepository
     */
    private $subjectRepository;

    /**
     * EnrollService constructor.
     * @param UserRepository $userRepository
     * @param SubjectRepository $subjectRepository
     * @internal param CourseRepository $courseRepository
     */
    public function __construct(UserRepository $userRepository, SubjectRepository $subjectRepository)
    {
        $this->userRepository = $userRepository;
        $this->subjectRepository = $subjectRepository;
    }

    /**
     * @param $subjectId
     * @return mixed
     */
    public function create($subjectId)
    {
        $courseId = $this->subjectRepository->find($subjectId)->course_id;

        return $this->userRepository->findWhere(['course_id' => $courseId])->lists('name', 'id');
    }

    public function store(array $data)
    {
        $this->subjectRepository->find($data['subject_id'])->users()->attach($data['user_id'], ['year_semester' => $data['year_semester']]);
    }
}