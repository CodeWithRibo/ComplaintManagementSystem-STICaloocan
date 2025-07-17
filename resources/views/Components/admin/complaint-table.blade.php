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
            <th class="px-6 py-4">Details</th>
        </tr>
        </thead>
        @forelse($complaints as $complaint)
            <tbody>
            <tr>
                <td class="px-6 py-4">{{$complaint->is_anonymous ?  'Anonymous' :$complaint->full_name }}</td>
                <td class="px-6 py-4">{{$complaint->title}}</td>
                <td class="px-6 py-4">{{$complaint->priority}}</td>
                <td class="px-6 py-4 text-secondary-yellow">{{$complaint->status}}</td>
                <td class="px-6 py-4">{{Carbon::parse($complaint->created_at)->format('F jS, Y g:i A')}}</td>
                <td class="px-6 py-4">{{$complaint->complaint_tracker}}</td>
                <td class="px-6 py-4">
                    <button class="btn btn-neutral"
                            @click="modalIsOpen = true; selectedComplaint = {{json_encode($complaint)}}"
                            type="submit">View Details</button>
                </td>
                @empty
                    <td  colspan="6" class="text-2xl text-gray-500 text-center italic"> No complaints have been submitted yet. </td>
            </tr>
            </tbody>
        @endforelse
    </table>
</div>
