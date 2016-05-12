<?php

namespace Projeto\Http\Controllers;

use Illuminate\Http\Request;

use Projeto\Http\Requests;
use Projeto\Services\ProjectFileService;

class ProjectFileController extends Controller
{
    /**
     * @var ProjectFileService
     */
    private $service;

    /**
     * ProjectFileController constructor.
     * @param ProjectFileService $service
     */
    public function __construct(ProjectFileService $service)
    {
        $this->service = $service;
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $subjectId, $projectId)
    {
        //return date('Y') . date('m') . date('d') . date('G') . date('i') . date('s');

        $data = [
            'file' => $request->file('project_file'),
            'name' => explode('.', $request->file('project_file')->getClientOriginalName())[0],
            'project_id' => $projectId,
            'extension' => $request->file('project_file')->getClientOriginalExtension(),
        ];

        $this->service->store($data);

        return redirect()->route('subject.project.show', array($subjectId, $projectId));
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
