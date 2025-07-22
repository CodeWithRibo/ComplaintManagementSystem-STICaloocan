@php use Illuminate\Support\Carbon; @endphp
<x-Layout>
    <x-admin.navigation-bar>
        <x-Section>
            <div class="overflow-x-auto bg-white px-5 py-5 mt-10 mx-6 shadow-md rounded-md">
                <h1 class="text-base-content text-2xl p-2 my-5 text-center xl:text-start border-l-4 border-primary bg-base-100 shadow-sm rounded-r-lg w-auto xl:w-96">Admin Accounts</h1>
                <table class="table table-md">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Date Registered</th>
                        <th>Manage</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($admins as $admin)
                        <tr>
                            <td>{{$admin->id}}</td>
                            <td>{{$admin->first_name .' '. $admin->last_name}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{empty($admin->contact_number) ? 'N/A' : $admin->contact_nmumber}}</td>
                            <td>{{Carbon::parse($admin->created_at)->format('F jS, Y g:i A')}}</td>
                            <td class="flex">
                                <a href="{{route('admin.show-admin-profile', $admin->id )}}" class="btn btn-primary mr-2 text-white">
                                    Edit Profile
                                </a>
                                <form action="{{route('destroy.admin-account', $admin->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  class="btn btn-error text-white ">Delete Account</button>
                                </form>
                            </td>
                            @empty
                                <td colspan="10" class="text-2xl text-gray-500 text-center italic"> No Admin account found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </x-Section>
    </x-admin.navigation-bar>
</x-Layout>
