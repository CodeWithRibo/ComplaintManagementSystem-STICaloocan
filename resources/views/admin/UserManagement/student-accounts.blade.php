@php use Illuminate\Support\Carbon; @endphp
<x-Layout>
    <x-admin.navigation-bar>
        <x-Section>
            <div class="overflow-x-auto bg-white px-5 py-5 mt-10 mx-6 shadow-md rounded-md">
                <a href="{{route('show.register')}}" class="btn btn-accent text-white">Add Student</a>
                <h1 class="text-base-content text-2xl p-2 my-5 text-center xl:text-start border-l-4 border-primary bg-base-100 shadow-sm rounded-r-lg w-auto xl:w-96"> Student Account</h1>
                <table class="table table-md">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Student ID</th>
                        <th>Email</th>
                        <th>Year & Section</th>
                        <th>Date Registered</th>
                        <th>Manage</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->first_name .' '. $user->last_name}}</td>
                            <td>{{$user->student_id_number}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->grade_level . ' ' . $user->section}}</td>
                            <td>{{Carbon::parse($user->created_at)->format('F jS, Y g:i A')}}</td>
                            <td class="flex">
                                <a href="{{route('admin.show-user-profile', $user->id )}}" class="btn btn-primary mr-2 text-white">
                                    Edit Profile
                                </a>
                                <form action="{{route('destroy', $user->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  class="btn btn-error text-white ">Delete Account</button>
                                </form>
                            </td>
                            @empty
                                <td colspan="10" class="text-2xl text-gray-500 text-center italic"> No User Found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            @include('Components.AuthFooter')

        </x-Section>
    </x-admin.navigation-bar>
</x-Layout>
