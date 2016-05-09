<?php

namespace Projeto\Http\Controllers;

use Illuminate\Http\Request;

use Projeto\Http\Requests;

use Projeto\Repositories\SubjectRepository;
use Projeto\Repositories\CourseRepository;
use Projeto\Service\SubjectService;

class SubjectController extends Controller
{
    /**
    * @var SubjectRepository
    */
    private $repository;
    
    /**
    * @var CourseRepository
    */
    private $courseRepository;
    /**
    * @var SubjectService
    */
    private $service;
    
    /**
    * SubjectController constructor.
    * @param SubjectRepository $repository
    * @param CourseRepository $courseRepository
    */
    public function __construct(SubjectRepository $repository, CourseRepository $courseRepository, SubjectService $service)
    {
        $this->repository = $repository;
        $this->courseRepository = $courseRepository;
        $this->service = $service;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = $this->repository->all();
        
        return view('subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = $this->courseRepository->lists('name', 'id');
        
        return view('subject.create', compact('courses'));
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
        
        return redirect()->route('subject.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = $this->repository->find($id);
        
        return view('subject.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = $this->repository->find($id);
        $courses = $this->courseRepository->lists('name', 'id');
        
        return view('subject.edit', compact('subject', 'courses'));
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
        $this->service->update($request->all(), $id);
        
        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        
        return redirect()->route('subject.index');
    }
}
