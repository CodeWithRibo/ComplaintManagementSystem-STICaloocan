<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;

class ResetPasswordController extends Controller
{

    public function getPassword($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => ['required','string','confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'token' => 'required',
        ]);

        try {
            $resetRecord = DB::table('password_reset_tokens')->where('email', $request->email)->first();
            if (Carbon::parse($resetRecord->created_at)->addMinutes(10)->isPast()) {
                return back()->with('error', 'The password reset link has expired.')->withInput();
            }
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);

                DB::table('password_reset_tokens')->where('email', $request->email)->delete();
                return redirect()->route('show.login')->with('success', 'Your password has been changed successfully!');
            }
            return back()->with('error', 'User not found!')->withInput();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', "We couldn't find a password reset request for that email.");
        }

    }
}
