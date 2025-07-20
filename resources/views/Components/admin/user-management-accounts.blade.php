@php use Illuminate\Support\Carbon; @endphp
            <div class="overflow-x-auto bg-white px-5 py-2 mt-10 mx-6">
                <x-Search></x-Search>{{--SEARCH BAR, UNDER DEVELOPMENT--}}
                <h1 class="text-base-content text-2xl p-2 my-5 text-center xl:text-start border-l-4 border-primary bg-base-100 shadow-sm rounded-r-lg w-auto xl:w-96">{{$header}}</h1>
                <table class="table table-md">
                    <thead>
                    <tr>
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
                            <td>{{$user->first_name .' '. $user->last_name}}</td>
                            <td>{{$user->student_id_number}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->grade_level . ' ' . $user->section}}</td>
                            <td>{{Carbon::parse($user->created_at)->format('F jS, Y g:i A')}}</td>
                            <td>
                                <a href="{{route('admin.show-user-profile', $user->id )}}" class="btn btn-primary text-white">
                                    Edit Profile
                                </a>
                            </td>
                            @empty
                                <td colspan="10" class="text-2xl text-gray-500 text-center italic"> {{$noUserFound}}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
