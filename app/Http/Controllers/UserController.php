<?php

namespace Projeto\Http\Controllers;

use Illuminate\Http\Request;

use Projeto\Http\Requests;

use Projeto\Entities\User;
use Projeto\Repositories\UserRepository;
use Projeto\Repositories\CourseRepository;
use Projeto\Services\UserService;

class UserController extends Controller
{

    /**
     * @var UserRepository
     */
    private $repository;
    /**
     * @var UserService
     */
    private $service;
    /**
    * @var CourseRepository
    */
    private $courseRepository;

    /**
     * UserController constructor.
     * @param UserRepository $repository
     * @param UserService $service
     * @param CourseRepository $courseRepository
     */
    public function __construct(UserRepository $repository, UserService $service, CourseRepository $courseRepository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->courseRepository = $courseRepository;
    }
    
    public function create()
    {
        $courses = ['' => ''] + $this->courseRepository->lists('name', 'id')->all();
        
        return view('user.create', compact('courses'));
    }
    
    public function store(Request $request)
    {
        return $this->service->store($request->all());
    }
    
    public function show($id)
    {
        $user = User::find($id);
        
        return view('user.show', compact('user'));
    }
}
