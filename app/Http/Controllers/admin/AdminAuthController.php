<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\AdminUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Validation\Rules\Password;

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
            'first_name' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
            'last_name' => ['required', 'string', 'min:2',  'max:50', 'regex:/^[a-zA-Z\s.-]+$/'],
            'email' => ['required', 'email', 'unique:admin_users', 'regex:/^[a-zA-Z0-9]+(?:[._-][a-zA-Z0-9]+)*@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}$/'],
            'password' => [
                'required',
                'string',
                'confirmed:repeat_password',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'contact_number' => ['nullable', 'max:11', 'regex:/^[0-9]+$/'],
        ]);

        $query = AdminUser::query();
        $query->create($validate);
        noty()
            ->timeout(2000)
            ->theme('relax')
            ->success('Registration complete! You can now log in to your account.');
        return redirect()->route('admin.show-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('admin')->attempt($credentials))
        {
            $request->session()->regenerate();
            $name = Auth::guard('admin')->user()->first_name;
            noty()
                ->timeout(2000)
                ->theme('relax')
                ->success("Hello $name, you're now logged in.");
            return redirect()->route('admin.index');
        }
        return back()->withErrors(['email' => 'Your email or password is incorrect.']);
    }

}
