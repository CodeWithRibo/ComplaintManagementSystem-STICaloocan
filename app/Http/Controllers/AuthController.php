<?php

namespace App\Http\Controllers;


use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public  function  showRegister()
    {
        return view('auth.Register');
    }

    public function showLogin()
    {
        return view('auth.Login');

    }

    public  function register(AuthRequest $request) : RedirectResponse
    {
        $validated = $request->validated();
        $query = User::query();
        $user = $query -> create($validated);
        Auth::login($user);

        return redirect('/');
    }


    public  function login()
    {

    }
}
