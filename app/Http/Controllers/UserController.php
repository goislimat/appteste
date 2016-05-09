<?php

namespace Projeto\Http\Controllers;

use Illuminate\Http\Request;

use Projeto\Http\Requests;

use Projeto\Repositories\UserRepository;
use Projeto\Repositories\CourseRepository;
use Projeto\Services\UserService;
use Projeto\Http\Controllers\Auth\AuthController as Auth;

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
    
    /**
    * Try to login a user
    *
    * return array
    */
    public function login(Request $request)
    {
        $user = $this->repository->findWhere([
            'user' => $request['user']
        ]);
        
        $user['password_check'] = bcrypt(123456);
        
        // if (Auth::attempt(array('user' => $request['user'], 'password' => $request['password']))){
        //     return "success";
        // }
        // else {        
        //     return "Wrong Credentials";
        // }
        
        return $user;
    }
    
    public function index()
    {
        $users = $this->repository->all();
        
        return view('user.index', compact('users'));
    }
    
    public function create()
    {
        $courses = ['' => ''] + $this->courseRepository->lists('name', 'id')->all();
        
        return view('user.create', compact('courses'));
    }
    
    public function store(Request $request)
    {
        $this->service->store($request->all());
        
        return redirect()->route('user.index');
    }
    
    public function show($id)
    {
        $user = $this->repository->find($id);
        
        return view('user.show', compact('user'));
    }
    
    public function edit($id)
    {
        $user = $this->repository->find($id);
        $courses = ['' => ''] + $this->courseRepository->lists('name', 'id')->all();
        
        return view('user.edit', compact('user', 'courses'));
    }
    
    public function update(Request $request, $id)
    {
        $this->service->update($request->all(), $id);
        
        return redirect()->route('user.index');
    }
    
    public function destroy($id)
    {
        $this->repository->delete($id);
        
        return redirect()->route('user.index');
    }
}
