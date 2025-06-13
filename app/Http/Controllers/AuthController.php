<?php

namespace App\Http\Controllers;


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

    /**
     * @throws ValidationException
     */
    public  function register(Request $request) : RedirectResponse
    {
        $validatedData = Validator::make($request->all(), [
        'first_name' => ['required', 'string', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
        'last_name' => ['required', 'string', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
        'email' => ['required', 'email', 'unique:users', 'regex:/^[a-zA-Z0-9]+(?:[._-][a-zA-Z0-9]+)*@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/'],
        'password' => ['required', 'string', 'confirmed:repeat_password'
        ,Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()],
        'student_id_number' => ['required', 'integer', 'unique:users', 'min:11'],
        'grade_level' => ['required', 'string'],
        'program' => ['required', 'string'],
        'contact_number' => ['nullable', 'integer']
            //Fixing Validation
    ])->validated();

//        $validatedData['password'] = bcrypt($validatedData['password']);
        $query = User::query();
        $user = $query -> create($validatedData);
        dd($user);
//        Auth::login($user);

//        return redirect('/');
    }

    public  function login()
    {

    }
}
