<?php

namespace App\Http\Controllers;


use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public  function  showRegister()
    {
        return view('auth.Register');
    }

    public  function register(AuthRequest $request) : RedirectResponse
    {
        $validated = $request->validated();
        $query = User::query();
        $user = $query -> create($validated);
        Auth::login($user);

        return redirect('/');
    }

    public function showLogin()
    {
        return view('auth.Login');
    }
    public  function login(Request $request) : RedirectResponse
    {
        $credentials = $request -> validate([
            'student_id_number' => ['required','regex:/^02000[0-9]{6}$/']
            ,'password' => ['required']]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return back()->withErrors(['student_id_number' => 'Your student ID number or password is incorrect.']);
    }

    public function logout(Request $request) : RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

       return redirect()->route('show.login');
    }
}


