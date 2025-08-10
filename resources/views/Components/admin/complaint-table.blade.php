@php use Illuminate\Support\Carbon; @endphp
<div class="overflow-x-auto overflow-visible">
    <!-- 🔍 Filters with Search Bar -->
    <x-Search :header="$header">
        <form action="" method="GET">
            @csrf
            <div class="relative">
                <input type="text" id="search" name="search"
                       value="{{request()->get('search')}}"
                       class="input input-bordered w-full pl-10 text-sm focus:outline-none focus:ring focus:ring-blue-400"
                       placeholder="Search by title or tracker...">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-gray-400 text-sm"></i>
            </div>
        </form>
    </x-Search>
    <table class="table table-md text-sm text-left text-gray-700">
        <thead class="uppercase">
        <tr>
            <th class="px-6 py-4">Author</th>
            <th class="px-6 py-4">Title</th>
            <th class="px-6 py-4">Priority</th>
            <th class="px-6 py-4">Status</th>
            <th class="px-6 py-4">Submitted</th>
            <th class="px-6 py-4">Complaint Tracker</th>
            <th class="px-6 py-4">Manage</th>
        </tr>
        </thead>
        @forelse($complaints as $complaint)
            <tbody>
            <tr>
                <td class="px-6 py-4">{{$complaint->is_anonymous ?  'Anonymous' :$complaint->full_name }}</td>
                <td class="px-6 py-4">{{$complaint->title}}</td>
                <td class="px-6 py-4">{{$complaint->priority}}</td>
                <td @class(['px-6 py-4 text-green-500 font-semibold' => $complaint->status === 'Resolved',
                             'px-6 py-4 text-yellow-500 font-semibold' => $complaint->status === 'Pending',
                             'px-6 py-4 text-blue-500 font-semibold' => $complaint->status === 'In Progress',
                             'px-6 py-4 text-gray-500 font-semibold' => $complaint->status === 'Archived'])>{{$complaint->status}}</td>
                <td class="px-6 py-4">{{Carbon::parse($complaint->created_at)->format('F jS, Y g:i A')}}</td>
                <td class="px-6 py-4">{{$complaint->complaint_tracker}}</td>
                <td class="px-6 py-4">
                    <div class="dropdown dropdown-left z-20 px-5">
                        <label tabindex="0" class="btn btn-primary text-white">Actions</label>
                        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-white rounded-box w-52 z-50 ">
                            @switch($complaint)
                                @case($complaint->status === 'Pending')
                                    <li>
                                        <a href="{{route('admin.show-edit-complaint', $complaint->id)}}" class="pl-5 cursor-pointer text-primary font-bold">Edit</a>
                                    </li>
                                    <li>
                                        <a class="text-primary pl-5 cursor-pointer font-bold"
                                           @click="modalIsOpen = true; selectedComplaint = {{json_encode($complaint)}}"
                                           type="button">View Complaint
                                        </a>
                                    </li>
                                    <x-admin.manage-form route="{{route('admin.in-progress', $complaint->id)}}" action="update" value="Mark as In Progress" class="text-blue-500"/>
                                    <x-admin.manage-form route="{{route('admin.resolved', $complaint->id)}}"  action="update" value="Mark as Resolved" class="text-green-500"/>
                                    <x-admin.manage-form route="{{route('admin.archived', $complaint->id)}}" action="update" value="Mark as Archived" class="text-gray-500"/>
                                    @break
                                @case($complaint->status === 'Resolved')
                                    <li>
                                        <a class="text-primary pl-5 cursor-pointer font-bold"
                                           @click="modalIsOpen = true; selectedComplaint = {{json_encode($complaint)}}"
                                           type="button">View Complaint
                                        </a>
                                    </li>
                                    <li>
                                        <a class="font-semibold text-neutral text-sm pl-5"
                                            href="{{route('admin.show-resolution-note', $complaint->id)}}">Resolution Note</a>
                                    </li>
                                    <x-admin.manage-form route="{{route('admin.archived', $complaint->id)}}" action="update" value="Mark as Archived" class="text-gray-500"/>
                                    @break
                                @case($complaint->status === 'Archived')
                                    <li><a href="#">Restore</a></li>
                                    <li>
                                        <a class="text-primary pl-5 cursor-pointer font-bold"
                                           @click="modalIsOpen = true; selectedComplaint = {{json_encode($complaint)}}"
                                           type="button">View Complaint
                                        </a>
                                    </li>
                                    <li><a href="#">Delete Permanently</a></li>
                                    @break
                                @case($complaint->status === 'In Progress')
                                    <li>
                                        <a href="{{route('admin.show-edit-complaint', $complaint->id)}}" class="pl-5 cursor-pointer text-primary font-bold">Edit</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.show-progress-note', $complaint->id)}}" class="pl-5 cursor-pointer text-primary font-bold">Progress Note</a>
                                    </li>
                                    <x-admin.manage-form route="{{route('admin.resolved', $complaint->id)}}" action="update" value="Mark as Resolved" class="text-green-500"/>
                                    <x-admin.manage-form route="{{route('admin.archived', $complaint->id)}}" action="update" value="Mark as Archived" class="text-gray-500"/>
                                    @break
                            @endswitch
                        </ul>
                    </div>
                </td>
                @empty
                    <td colspan="10" class="text-2xl text-gray-500 text-center italic"> {{$noComplaintFound}}</td>
            </tr>
            </tbody>
        @endforelse
    </table>
</div>
