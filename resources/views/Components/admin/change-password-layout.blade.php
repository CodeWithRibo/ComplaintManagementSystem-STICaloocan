@props(['route' => ''])
<div class="w-full max-w-xl bg-white shadow-md rounded-lg p-8" x-data ="{passwordShow : false}">
    <div class="text-center mb-6 pt-2">
        <h2 class="text-2xl font-bold text-gray-800">Change Password</h2>
    </div>
    <form action="{{$route}}" method="POST" class="space-y-5 p-5">
        @csrf
        <x-FormLayout type="password" name="password" placeholder="Enter new password" label="New Password" x-bind:type="passwordShow ? 'text' : 'password'" class="relative z-0" />
        <x-FormLayout type="password" name="password_confirmation" placeholder="Re-enter new password" label="Confirm Password"   x-bind:type="passwordShow ? 'text' : 'password'" class="relative z-0"/>
        <div class="flex items-center gap-3">
            <input type="checkbox" class="cursor-pointer" id="showPassword" @click="passwordShow = !passwordShow" >
            <p class="text-gray-500">Show Password</p>
        </div>
        <div class="pt-4">
            <button type="submit" class="w-full btn btn-secondary text-white">Update Password</button>
        </div>
    </form>
</div>
