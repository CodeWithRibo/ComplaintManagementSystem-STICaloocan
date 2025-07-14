<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\AdminUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class AdminAuthController extends Controller
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

        $query = AdminUser::query();
        $query->create($validate);

        return redirect('admin/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'user_name' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('admin')->attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('admin.index');
        }
        return back()->withErrors(['user_name' => 'Your user name or password is incorrect.']);
    }

}
