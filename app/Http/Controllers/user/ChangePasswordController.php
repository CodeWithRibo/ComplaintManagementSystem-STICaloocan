<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\user\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ChangePasswordController extends Controller
{


    public function showChangePassword(User $user) : View
    {
        return view('user.auth.change-password', compact('user'));
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

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        noty()
            ->theme('relax')
            ->success('Update password successfully. You may now login your account');

        return redirect()->route('dashboard.profile');
    }



}
