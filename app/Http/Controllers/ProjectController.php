<?php

namespace Projeto\Http\Controllers;

use Illuminate\Http\Request;

use Projeto\Http\Requests;
use Projeto\Repositories\ProjectRepository;
use Projeto\Repositories\SubjectRepository;
use Projeto\Services\ProjectService;

class ProjectController extends Controller
{
    /**
    * @var ProjectRepository
    */
    private $repository;
    /**
    * @var SubjectRepository
    */
    private $subjectRepository;
    /**
    * @var ProjectService
    */
    private $service;
    
    /**
    * ProjectController constructor.
    * @param ProjectRepository $repository
    */
    public function __construct(ProjectRepository $repository, SubjectRepository $subjectRepository, ProjectService $service)
    {
        $this->repository = $repository;
        $this->subjectRepository = $subjectRepository;
        $this->service = $service;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = $this->repository->all();
        
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = $this->subjectRepository->lists('name', 'id');
        
        return view('project.create', compact('subjects'));
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
        
        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = $this->repository->find($id);
        
        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = $this->service->edit($id);        
        $subjects = $this->subjectRepository->lists('name', 'id');
        
        return view('project.edit', compact('project', 'subjects'));
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
        
        return redirect()->route('project.index');
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
        
        return redirect()->route('project.index');
    }
}
