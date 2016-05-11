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
     * @param SubjectRepository $subjectRepository
     * @param ProjectService $service
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
     * @param $subjectId
     * @return \Illuminate\Http\Response
     */
    public function index($subjectId)
    {
        $projects = $this->repository->findWhere(['subject_id' => $subjectId]);
        //return $this->repository->findWhere(['subject_id' => $subjectId]);


        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $subjectId
     * @return \Illuminate\Http\Response
     */
    public function create($subjectId)
    {
        $subject = $this->subjectRepository->find($subjectId);
        
        return view('project.create', compact('subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $subjectId)
    {
        $project = $this->service->store($request->all());
        
        return redirect()->route('subject.project.show', array($subjectId, $project->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($subjectId, $id)
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
    public function edit($subjectId, $id)
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
    public function update(Request $request, $subjectId, $id)
    {
        $this->service->update($request->all(), $id);
        
        return redirect()->route('subject.project.show', array($subjectId, $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($subjectId, $id)
    {
        $this->repository->delete($id);
        
        return redirect()->route('subject.project.index', array($subjectId));
    }
}
