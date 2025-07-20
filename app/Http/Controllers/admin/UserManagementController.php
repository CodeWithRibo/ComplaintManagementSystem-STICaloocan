<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\user\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserManagementController extends Controller
{

        public function showStudentAccount() : View
        {
            $users = User::with('complaints')->paginate(10);
            return view('admin.UserManagement.student-accounts', compact('users'));
        }

        public function showAdminAccount() : View
        {
            return view('admin.UserManagement.admin-accounts');
        }

        public function showUserProfile(User $user) : View
        {
            return view('admin.UserManagement.user-profile', compact('user'));
        }

        public function editUserProfile(User $user, Request $request) : RedirectResponse
        {

            $validated = $request->validate([
                'first_name' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
                'last_name' => ['required', 'string', 'min:2',  'max:50', 'regex:/^[a-zA-Z\s.-]+$/'],
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users', 'email')->ignore($user->id),
                    'regex:/^[a-zA-Z0-9]+(?:[._-][a-zA-Z0-9]+)*@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}$/'
                ],
                'student_id_number' => [
                    'required',
                    'string',
                    Rule::unique('users', 'student_id_number')->ignore($user->id),
                    'regex:/^02000[0-9]{6}$/'
                ],
                'grade_level' => ['required', 'string'],
                'program' => ['required', 'string'],
                'section' => ['required', 'string', 'regex:/^[A-Z]{2,4}-\d{3}$/'],
                'contact_number' => ['nullable', 'max:11', 'regex:/^[0-9]+$/'],
            ]);

            $user->update($validated);
            $user->save();
            return redirect()->route('admin.student-accounts');
        }


}
