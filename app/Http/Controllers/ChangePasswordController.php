<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function testing(User $user)
    {
        return view('change-password', compact('user'));
    }

    public function changePassword(User $user, Request $request)
    {
       $validate = $request->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $testing = Hash::check($request->current_password, $user->getAuthPassword());
        dd($testing);
        $request->user()->fill([
            'password' => Hash::make($request->password)
        ])->save();

        noty()
            ->theme('relax')
            ->success('Password updated successfully');
        return redirect()->route('dashboard.profile');
    }



}
