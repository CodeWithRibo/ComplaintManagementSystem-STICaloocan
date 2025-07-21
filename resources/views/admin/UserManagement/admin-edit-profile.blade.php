<x-Layout>
    <x-admin.navigation-bar>
        <x-Section>
            <x-admin.profile-layout route="{{route('admin.admin-profile' , $adminUser->id)}}">

                <x-admin.input-layout label="First Name" name="first_name" placeholder="e.g., Juan " value="{{$adminUser->first_name}}"/>
                <x-admin.input-layout label="Last Name" name="last_name" placeholder="e.g., Dela Cruz " value="{{$adminUser->last_name}}"/>
                <x-admin.input-layout label="Email" name="email" placeholder="e.g., juandelacruz@gmail.com" value="{{$adminUser->email}}"/>
                <x-admin.input-layout label="Contact Number" name="contact_number" placeholder="e.g., 09933404418" value="{{$adminUser->contact_number}}"/>

            </x-admin.profile-layout>

            <form action="{{route('admin.admin-change-password', $adminUser->id)}}" method="POST">
                @csrf
                <div class="space-y-12 bg-white mx-10 my-5 py-5 px-5 rounded-md shadow-lg">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h1 class="text-base-content text-2xl p-2 my-5 text-center xl:text-start border-l-4 border-primary bg-base-100 shadow-sm rounded-r-lg w-auto xl:w-96">
                            Change Password</h1>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <x-admin.input-layout label="New Password" name="password" placeholder="New Password" />
                            <x-admin.input-layout label="Confirm Password" name="password_confirmation" placeholder="Re-enter new password"/>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="submit" class="btn btn-primary text-white px-10 ">Update</button>
                    </div>
                </div>
            </form>
        </x-Section>
    </x-admin.navigation-bar>
</x-Layout>
