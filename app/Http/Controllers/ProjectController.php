<?php

namespace Projeto\Http\Controllers;

use Illuminate\Http\Request;

use Projeto\Http\Requests;
use Projeto\Repositories\ProjectRepository;
use Projeto\Repositories\SubjectRepository;

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
    * ProjectController constructor.
    * @param ProjectRepository $repository
    */
    public function __construct(ProjectRepository $repository, SubjectRepository $subjectRepository)
    {
        $this->repository = $repository;
        $this->subjectRepository = $subjectRepository;
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
        $project = $this->joinDatetime($request->all());       
        
        $this->repository->create($project);
        
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
        $project = $this->repository->find($id);
        $project = $this->explodeDatetime($project);
        
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
        $project = $this->joinDatetime($request->all());
        
        $this->repository->update($project, $id);
        
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
    
    /**
    * Join date and time into 1 datetime var
    *
    * @param $project
    * return arrar
    */
    private function joinDatetime($project)
    {
        $project['due_date'] = date_format(date_create($project['due_date']), 'Y-m-d') . ' ' . $project['time'];
        
        return $project;
    }
    
    /**
    * Explodes datetime from databse into date and time
    *
    * @param $project
    * return array
    */
    private function explodeDatetime($project)
    {
        $dt = explode(' ', $project->due_date);
        $project['due_date'] = date_format(date_create($dt[0]), 'd/m/Y');
        $project['time'] = $dt[1];
        
        return $project;
    }
}
