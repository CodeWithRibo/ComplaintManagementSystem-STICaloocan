<?php

namespace App\Http\Controllers\user;


use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\user\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showRegister()
    {
        return view('user.auth.register');
    }

    public function register(AuthRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $query = User::query();
        $query->create($validated);

        noty()
            ->timeout(2000)
            ->theme('relax')
            ->success('Add Student complete!');
        return redirect()->route('admin.student-accounts');
    }

    public function showLogin()
    {
        return view('user.auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'student_id_number' => ['required', 'regex:/^02000[0-9]{6}$/']
            , 'password' => ['required']]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            $name = $request->user()->first_name;
            noty()
                ->timeout(2000)
                ->theme('relax')
                ->success("Hello $name, you're now logged in.");
            return redirect()->route('dashboard.home');
        }
        return back()->withErrors(['student_id_number' => 'Your student ID number or password is incorrect.']);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }
}


