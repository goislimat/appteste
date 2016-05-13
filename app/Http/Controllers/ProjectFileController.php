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
     * @param Request $request
     * @param $subjectId
     * @param $projectId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request, $subjectId, $projectId)
    {

        $file = $request->file('project_file');
        $extension = $file->getClientOriginalExtension();

        $this->service->add($file, $extension, $projectId);

        return redirect()->route('subject.project.show', array($subjectId, $projectId));
    }

    /**
     * @param $subjectId
     * @param $projectId
     * @param $filename
     * @return $this
     */
    public function get($subjectId, $projectId, $filename)
    {
        return $this->service->get($filename);
    }
}
