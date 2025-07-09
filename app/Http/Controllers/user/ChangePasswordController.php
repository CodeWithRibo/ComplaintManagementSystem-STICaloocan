<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{


    public function testing(User $user)
    {
        return view('auth.change-password', compact('user'));
    }

    public function changePassword(User $user, Request $request)
    {
        $request->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'different:current_password']
        ]);

        $checkCurrentPassword = Hash::check($request->current_password, $user->getAuthPassword());
        if(!$checkCurrentPassword)
        {
            return redirect()->back()->with('error', 'Current password does not match');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        noty()
            ->theme('relax')
            ->success('Update password successfully. You may now login your account');

        return redirect()->route('dashboard.profile');
    }



}
