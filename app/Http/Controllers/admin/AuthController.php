<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function showRegister()
    {
        return view('admin.auth.register');
    }

    public function register(Request $request)
    {
        $validate = $request->validate([
            'user_name' => 'required|string',
            'password' => 'required|string|confirmed:repeat_password',
        ]);

        $query = User::query();
        $query->create($validate);

        return redirect('admin/login');
    }

    public function login(Request $request)
    {
        $credential = $request->validate([
            'user_name' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credential))
        {
            $request->session()->regenerate();
            return redirect('admin.login');
        }
        return back();
    }

}
