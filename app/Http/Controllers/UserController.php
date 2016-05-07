<?php

namespace Projeto\Http\Controllers;

use Illuminate\Http\Request;

use Projeto\Http\Requests;

use Projeto\Entities\User;
use Projeto\Repositories\UserRepository;
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
     * UserController constructor.
     * @param UserRepository $repository
     * @param UserService $service
     */
    public function __construct(UserRepository $repository, UserService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
    
    public function create()
    {
        return view('user.create');
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
