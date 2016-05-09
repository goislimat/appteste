<?php

namespace Projeto\Services;

use Projeto\Repositories\ProjectRepository;

class ProjectService
{
    /**
    * @var ProjectRepository
    */
    private $repository;

    /**
    * ProjectService constructor.
    * @param ProjectRepository $repository
    */
    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
    * Does the procedure to store a new project
    *
    * @param array $data
    * return array
    */
    public function store(array $data)
    {
        $project = $this->joinDatetime($data);
        
        return $this->repository->create($project);
    }
    
    /**
    * Does the procedure to find and generate the array to edit a project
    *
    * @param array $data
    * return array
    */
    public function edit($id)
    {
        $project = $this->repository->find($id);
        
        return $this->explodeDatetime($project);
    }
    
    /**
    * Does the procedure to update a project
    *
    * @param array $data
    * return array
    */
    public function update(array $data, $id)
    {
        $project = $this->joinDatetime($data);
        
        return $this->repository->update($project, $id);
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