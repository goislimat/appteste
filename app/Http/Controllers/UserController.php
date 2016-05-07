<?php

namespace Projeto\Http\Controllers;

use Illuminate\Http\Request;

use Projeto\Http\Requests;

use Projeto\Entities\User;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }
    
    public function store(Request $request)
    {
        $user = $request->all();
        
        $password = str_random(8);
        $user['password'] = $password;
        
        $user = User::create($user);
        
        if($user->type == 1)
        {
            $user->user = 'ADS' . $user->year . str_pad($user->id, 5, '0', STR_PAD_LEFT);
        }
        else
        {
            $user->user = 'PROF' . $user->year . str_pad($user->id, 4, '0', STR_PAD_LEFT);
        }
        
        $user->save();
        
        //enviar um email para $user-email com $user->user e $password
        //dispara mensagem de sucesso
        return $user;
    }
    
    public function show($id)
    {
        $user = User::find($id);
        
        return view('user.show', compact('user'));
    }
}
