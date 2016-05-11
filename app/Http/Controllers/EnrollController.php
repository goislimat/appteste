<?php

namespace Projeto\Http\Controllers;

use Illuminate\Http\Request;

use Projeto\Http\Requests;
use Projeto\Repositories\SubjectRepository;
use Projeto\Repositories\UserRepository;
use Projeto\Services\EnrollService;

class EnrollController extends Controller
{
    /**
     * @var EnrollService
     */
    private $service;
    /**
     * @var SubjectRepository
     */
    private $subjectRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * EnrollController constructor.
     * @param EnrollService $service
     * @param SubjectRepository $subjectRepository
     * @param UserRepository $userRepository
     */
    public function __construct(EnrollService $service, SubjectRepository $subjectRepository, UserRepository $userRepository)
    {
        $this->service = $service;
        $this->subjectRepository = $subjectRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $subjectId
     * @return \Illuminate\Http\Response
     */
    public function create($subjectId)
    {
        $students = $this->service->create($subjectId);
        $subjects = $this->subjectRepository->lists('name', 'id');

        return view('enroll.new', compact('students', 'subjects', 'subjectId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->service->store($request->all());

        $subjectId = $request['subject_id'];

        return redirect()->route('subject.show', compact('subjectId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $subjectId
     * @return \Illuminate\Http\Response
     */
    public function newTeacher($subjectId)
    {
        $teachers = $this->service->newTeacher();
        $subjects = $this->subjectRepository->lists('name', 'id');

        return view('enroll.new_teacher', compact('teachers', 'subjects', 'subjectId'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $subjectId
     * @param $userId
     * @param $yearSemester
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy($subjectId, $userId, $yearSemester)
    {
        $this->service->destroy($subjectId, $userId, $yearSemester);

        return ($this->userRepository->find($userId)->type == 1)
                ? redirect()->route('subject.all', compact('subjectId'))
                : redirect()->route('subject.all', array($subjectId, 'teacher'));
    }
}
