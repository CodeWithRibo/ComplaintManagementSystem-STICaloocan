<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\AdminUser;
use App\Models\user\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserManagementController extends Controller
{

        public function notify(string $userDeleteNotify, string $adminDeleteNotify, string $updatePassword, string $updateProfile): void
        {
            if ($userDeleteNotify == 'userDelete') {
                noty()
                    ->theme('relax')
                    ->success('Student Account Delete successfully');
            }

            if ($adminDeleteNotify == 'adminDelete') {
                noty()
                    ->theme('relax')
                    ->success('Admin Account Delete successfully');
            }

            if ($updatePassword === 'updatePassword'){
                noty()
                    ->theme('relax')
                    ->success('Update password successfully');
            }

            if($updateProfile === 'updateProfile') {
                noty()
                    ->theme('relax')
                    ->success('Update profile successfully');
            }

        }

        public function showStudentAccount() : View
        {
            $users = User::with('complaints')->paginate(10);
            return view('admin.UserManagement.student-accounts', compact('users'));
        }

        public function showAdminAccount() : View
        {
            $query = AdminUser::query();
            $admins = $query->orderBy('created_at', 'desc')->paginate(10);
            return view('admin.UserManagement.admin-accounts', compact('admins'));
        }

    // ----------------------------- Student Account--------------------------//
        public function showUserProfile(User $user) : View
        {
            return view('admin.UserManagement.user-edit-profile', compact('user'));
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
            $this->notify('', '', '', 'updateProfile');

            return redirect()->route('admin.student-accounts');
        }

        public function userChangePassword(User $user, Request $request) : RedirectResponse
        {
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed', 'different:current_password']
            ]);

            $user->password = Hash::make($request->password);
            $user->save();
            $this->notify('', '', 'updatePassword', '');

            return redirect()->route('admin.student-accounts');
        }

        public function destroy(User $user): RedirectResponse
        {
            $user->delete();
            $this->notify('userDelete', '', '', '');
            return redirect()->route('admin.student-accounts');
        }

    // ----------------------------- Admin Account--------------------------//


    public function showAdminProfile(AdminUser $adminUser)
    {
        return view('admin.UserManagement.admin-edit-profile', compact('adminUser'));
    }
    public function editAdminProfile(AdminUser $adminUser, Request $request) : RedirectResponse
    {

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
            'last_name' => ['required', 'string', 'min:2',  'max:50', 'regex:/^[a-zA-Z\s.-]+$/'],
            'contact_number' => ['nullable', 'max:11', 'regex:/^[0-9]+$/'],

        ]);

        $adminUser->update($validated);
        $adminUser->save();
        $this->notify('', '', '', 'updateProfile');

        return redirect()->route('admin.admin-accounts');
    }
        public function destroyAdminAccount(AdminUser $adminUser): RedirectResponse
        {
            $adminUser->delete();
            $this->notify('', 'adminDelete', '', '');
            return redirect()->route('admin.student-accounts');
        }

    public function adminChangePassword(AdminUser $adminUser, Request $request) : RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed', 'different:current_password']
        ]);

        $adminUser->password = Hash::make($request->password);
        $adminUser->save();
        $this->notify('', '', 'updatePassword', '');


        return redirect()->route('admin.admin-accounts');
    }


}
