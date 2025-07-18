@php use Illuminate\Support\Carbon; @endphp
<div class="rounded-lg shadow-md overflow-x-auto ">
    <table class="table w-full text-sm text-left text-gray-700">
        <thead class="bg-gray-100 text-gray-700 uppercase">
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
                             'px-6 py-4 text-gray-500 font-semibold' => $complaint->status === 'Archive'])>{{$complaint->status}}</td>
                <td class="px-6 py-4">{{Carbon::parse($complaint->created_at)->format('F jS, Y g:i A')}}</td>
                <td class="px-6 py-4">{{$complaint->complaint_tracker}}</td>
                <td class="px-6 py-4">
                    <div class="dropdown dropdown-left">
                        <label tabindex="0" class="btn btn-primary text-white">Actions</label>
                        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-white rounded-box w-52 z-50 ">
                            @switch($complaint)
                                @case($complaint->status === 'Pending')
                                    <li><a href="#">Edit</a></li>
                                    <li><a href="#">Resolve</a></li>
                                    <li><a href="#">Resolve</a></li>
                                    <li><a href="#">Archive</a></li>
                                    @break
                                @case($complaint->status === 'Resolved')
                                    <li><a href="#">View</a></li>
                                    <li><a href="#">Add/Edit Resolution Note</a></li>
                                    <li><a href="#">Archive</a></li>
                                    @break
                                @case($complaint->status === 'Archived')
                                    <li><a href="#">Restore</a></li>
                                    <li><a href="#">View</a></li>
                                    <li><a href="#">Delete Permanently</a></li>
                                    @break
                                @case($complaint->status === 'In Progress')
                                    <li><a href="#">Edit</a></li>
                                    <li><a href="#">Resolve</a></li>
                                    <li><a href="#">Archive</a></li>
                                    @break
                            @endswitch
                        </ul>
                    </div>
                </td>
                @empty
                    <td colspan="6" class="text-2xl text-gray-500 text-center italic"> No complaints have been submitted
                        yet.
                    </td>
            </tr>
            </tbody>
        @endforelse
    </table>
</div>
{{--<button class="btn btn-neutral"--}}
{{--        @click="modalIsOpen = true; selectedComplaint = {{json_encode($complaint)}}"--}}
{{--        type="submit">View Complaint--}}
{{--</button>--}}
