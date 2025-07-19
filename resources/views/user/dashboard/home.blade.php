@php use Illuminate\Support\Carbon; @endphp
<x-Layout>
    <x-HomeNavigationBar>
        <x-Section>
            <div class="grid lg:grid-cols-4 lg:grid-rows-2 grid-cols-1 grid-rows-2 gap-4 px-4 pt-5">
                <div class="rounded lg:col-span-2 shadow-lg bg-white">
                    <div class="card-title py-2 flex px-4">
                        <div class="flex-1">
                            <h1 class="text-button">Latest Complaints (Recently updated)</h1>
                            <p class="text-secondary-gray text-[10px] font-semibold"> {{empty($complaintData['latestComplaint']) ? 'No Recent updates' :  'Updated ' . Carbon::parse($complaintData['latestComplaint']->updated_at)->diffForHumans()}}</p>
                        </div>
                        <div class="flex-none">
                            <a href="{{route('dashboard.listComplaint')}}" class="text-secondary-gray text-base font-semibold">View All</a>
                        </div>
                    </div>
                    <div class="w-full border-t-2 border-[#E7C01D] mb-3"></div>
                    <div class="card-body bg-white  overflow-x-auto ">
                        @if(empty($complaintData['latestComplaint']))
                            <div class="text-center py-8 text-gray-500">
                                <i class="fa-regular fa-folder-open text-3xl mb-2"></i>
                                <p class="text-sm font-medium">No complaints found.</p>
                            </div>
                        @else
                            <table class="w-full table-auto text-sm text-left border-separate border-spacing-y-2">
                                <!-- Table Head -->
                                <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                                <tr>
                                    <th class="px-6 py-3 rounded-tl-md">Title</th>
                                    <th class="px-6 py-3">Status</th>
                                    <th class="px-6 py-3">Submitted</th>
                                    <th class="px-6 py-3 rounded-tr-md">Complaint Tracker</th>
                                </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                <tr class="bg-white shadow-sm hover:shadow-md transition rounded-md">
                                    <td class="px-6 py-4 font-medium text-gray-800">{{$complaintData['latestComplaint']->title}}</td>
                                    <td class="px-6 py-4">
                                    @if($complaintData['latestComplaint']->status === 'Pending')
                                            <x-StatusLayout label="Pending" icon="pending" class="bg-yellow-100 text-yellow-800"/>
                                    @elseif($complaintData['latestComplaint']->status === 'Resolved')
                                            <x-StatusLayout label="Resolved" icon="resolved" class="bg-green-100 text-green-800"/>
                                    @elseif($complaintData['latestComplaint']->status === 'In Progress')
                                            <x-StatusLayout label="In Progress" icon="inProgress" class="bg-blue-100 text-blue-800"/>
                                        @else
                                        <x-StatusLayout label="Archive" icon="archive" class="bg-gray-100 text-gray-800"/>
                                    @endif
                                    </td>
                                    <td class="px-6 py-4 text-[13px] text-gray-500">{{Carbon::parse($complaintData['latestComplaint']->created_at)->format('F jS, Y g:i A')}}</td>
                                    <td class="px-6 py-4 italic text-[13px] text-gray-700">{{$complaintData['latestComplaint']->complaint_tracker}}</td>
                                </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
                <div class="row-start-2 lg:col-span-2  rounded bg-white">
                    <div class="card-title py-2 flex px-4">
                        <div class="flex-1">
                            <h1 class="text-button">Resolved Complaint (Recently updated)</h1>
                            <p class="text-secondary-gray text-[10px] font-semibold"> {{empty($complaintData['resolvedComplaint']) ? 'No Recent updates' :  'Updated ' . Carbon::parse($complaintData['resolvedComplaint']->updated_at)->diffForHumans()}}</p>
                        </div>
                        <div class="flex-none">
                            <a href="{{route('complaints.resolved')}}" class="text-secondary-gray text-base font-semibold">View All</a>
                        </div>
                    </div>
                    <div class="w-full border-t-2 border-[#E7C01D] mb-3"></div>
                    <div class=" card-body bg-white overflow-x-auto">
                        @if(empty($complaintData['resolvedComplaint']))
                            <div class="text-center py-8 text-gray-500">
                                <i class="fa-regular fa-folder-open text-3xl mb-2"></i>
                                <p class="text-sm font-medium">No resolved complaints found.</p>
                            </div>
                        @else
                        <table class="w-full table-auto border-separate border-spacing-y-2 text-sm text-left">
                            <!-- Table Head -->
                            <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                            <tr>
                                <th class="px-6 py-3 rounded-tl-md">Title</th>
                                <th class="px-6 py-3">Resolved On</th>
                                <th class="px-6 py-3">Category</th>
                                <th class="px-6 py-3">Complaint Tracker</th>
                                <th class="px-6 py-3 rounded-tr-md">Resolution Note</th>
                            </tr>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            <tr class="bg-white shadow-sm hover:shadow-md transition rounded-md">
                                <td class="px-6 py-4 font-medium text-gray-800">{{$complaintData['resolvedComplaint']->title}}</td>
                                <td class="px-6 py-4 text-[13px] text-gray-500">{{Carbon::parse($complaintData['resolvedComplaint']->resolved_on)->format('F jS, Y g:i A')}}</td>
                                <td class="px-6 py-4  text-[13px] text-gray-700">{{$complaintData['resolvedComplaint']->category}}</td>
                                <td class="px-6 py-4 text-[13px] text-gray-600">{{$complaintData['resolvedComplaint']->complaint_tracker}}</td>
                                <td class="px-6 py-4 text-[13px] text-gray-600">{{$complaintData['resolvedComplaint']->resolution_note}}</td>
                            </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
                <div class="row-start-3 lg:col-span-2 lg:col-start-3 lg:row-span-2  p-4 rounded bg-white">
                    <div class="hero bg-base-200">
                        <div class="hero-content text-center">
                            <div class="max-w-md">
                                <h1 class="text-5xl font-bold">Need Help? We're Listening</h1>
                                <p class="py-6">
                                    Ready to Submit a Concern? Click here to submit a new complaint. We’ve got you
                                    covered!
                                </p>
                                <a href="{{route('complaints.create')}}" type="button" class="btn btn-primary text-white">Submit
                                    Complaint</a>
                            </div>
                        </div>
                    </div>
                    <div class="card w-full card-md shadow-sm mt-10 bg-white">
                        <div class="card-body">
                            <h2 class="card-title text-button">Status (Recently updated)</h2>
                            <p class="text-secondary-gray text-[10px] font-semibold">{{empty($complaintData['latestComplaint']) ? 'No recent updates' : 'Updated ' . Carbon::parse($complaintData['latestComplaint']->updated_at)->diffForHumans()}}</p>
                            <div class="w-full border-t-2 border-[#E7C01D] mb-3"></div>
                            <div class="flex flex-col sm:flex-row gap-4 justify-start items-start card-actions">
                                <x-CountLayout label="Pending" class="bg-yellow-100 border border-yellow-300 text-yellow-800" icon="pending">
                                    {{empty($count['pending']) ? 'No Complaint' : $count['pending']. ' Complaints'}}
                                </x-CountLayout>

                                <x-CountLayout label="Resolved" class="bg-green-100 border border-green-300 text-green-800 flex-1" icon="resolved">
                                    {{empty($count['resolved']) ? 'No Complaint' : $count['resolved']. ' Complaints'}}
                                </x-CountLayout>

                                <x-CountLayout label="In Progress" class="bg-blue-100 border border-blue-300 text-blue-800 " icon="inProgress">
                                    {{empty($count['inProgress']) ? 'No Complaint' : $count['inProgress']. ' Complaints'}}
                                </x-CountLayout>

                                <x-CountLayout label="Archived" class="bg-gray-100 border border-gray-300 text-gray-800 flex-1" icon="archive">
                                    {{empty($count['archive']) ? 'No Complaint' : $count['archive']. ' Complaints'}}
                                </x-CountLayout>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @include('Components.AuthFooter')
        </x-Section>
    </x-HomeNavigationBar>
</x-Layout>
