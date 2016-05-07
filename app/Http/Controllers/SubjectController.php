<?php

namespace Projeto\Http\Controllers;

use Illuminate\Http\Request;

use Projeto\Http\Requests;

use Projeto\Repositories\SubjectRepository;
use Projeto\Repositories\CourseRepository;

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
    * SubjectController constructor.
    * @param SubjectRepository $repository
    * @param CourseRepository $courseRepository
    */
    public function __construct(SubjectRepository $repository, CourseRepository $courseRepository)
    {
        $this->repository = $repository;
        $this->courseRepository = $courseRepository;
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
        return $this->repository->create($request->all());
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
