<?php

namespace Projeto\Http\Controllers;

use Illuminate\Http\Request;

use Projeto\Http\Requests;
use Projeto\Repositories\SubjectRepository;
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
     * EnrollController constructor.
     * @param EnrollService $service
     * @param SubjectRepository $subjectRepository
     */
    public function __construct(EnrollService $service, SubjectRepository $subjectRepository)
    {
        $this->service = $service;
        $this->subjectRepository = $subjectRepository;
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
