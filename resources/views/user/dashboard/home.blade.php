@php use Illuminate\Support\Carbon; @endphp
<x-Layout>
    <x-HomeNavigationBar>
        {{-- Main Content Area --}}
        <x-Section>
            <div class="grid lg:grid-cols-4 lg:grid-rows-2 grid-cols-1 grid-rows-2 gap-4 px-4 pt-5">
                {{--COMPLAINTS--}}
                <div class="rounded lg:col-span-2 shadow-lg bg-white">
                    <div class="card-title py-2 flex px-4">
                        <div class="flex-1">
                            <h1 class="text-button">Complaints (Recently updated)</h1>
                            <p class="text-secondary-gray text-[10px] font-semibold"> {{empty($complaintData) ? 'No Recent updates' :  'Updated ' . Carbon::parse($complaintData->updated_at)->diffForHumans()}}</p>
                        </div>
                        <div class="flex-none">
                            <a href="{{route('dashboard.listComplaint')}}" class="text-secondary-gray text-base font-semibold">View All</a>
                        </div>
                    </div>
                    <div class="w-full border-t-2 border-[#E7C01D] mb-3"></div>
                    <div class="card-body bg-white  overflow-x-hidden ">
                        @if(empty($complaintData))
                            <div class="text-center py-8 text-gray-500">
                                <i class="fa-regular fa-folder-open text-3xl mb-2"></i>
                                <p class="text-sm font-medium">No complaints found.</p>
                            </div>                        @else
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
                                    <td class="px-6 py-4 font-medium text-gray-800">{{$complaintData->title}}</td>
                                    <td class="px-6 py-4">
                                        @if($complaintData->status == 'Resolved')
                                            <span class="inline-flex items-center gap-2 text-xs font-semibold text-green-800 bg-green-100 border border-green-300 px-3 py-1 rounded-full">
                                        <i class="fa-solid fa-check text-green-600 text-sm"></i>
                                        <span class="text-sm">Resolved</span>
                                    </span>
                                        @else
                                            <span
                                                class="inline-flex items-center gap-1 text-xs font-semibold text-yellow-800 bg-yellow-100 px-3 py-1 rounded-full">
                                    <i class="fa-solid fa-spinner animate-spin text-yellow-600"></i>
                                      <span class="font-semibold text-sm">Pending</span>
                                </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-[13px] text-gray-500">{{Carbon::parse($complaintData->created_at)->format('F jS, Y g:i A')}}</td>
                                    <td class="px-6 py-4 italic text-[13px] text-gray-700">{{$complaintData->complaint_tracker}}</td>
                                </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
                {{--RESOLVED COMPLAINT--}}
                <div class="row-start-2 lg:col-span-2 bg-gray-100 rounded bg-white">
                    <div class="card-title py-2 flex px-4">
                        <div class="flex-1">
                            <h1 class="text-button">Resolved Complaint (Recently updated)</h1>
                            <p class="text-secondary-gray text-[10px] font-semibold">Updated 13 hours ago</p>
                        </div>
                        <div class="flex-none">
                            <span class="text-secondary-gray text-base font-semibold">View All</span>
                        </div>
                    </div>
                    <div class="w-full border-t-2 border-[#E7C01D] mb-3"></div>
                    <div class=" card-body bg-white overflow-x-hidden">
                        <table class="w-full table-auto border-separate border-spacing-y-2 text-sm text-left">
                            <!-- Table Head -->
                            <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                            <tr>
                                <th class="px-6 py-3 rounded-tl-md">Title</th>
                                <th class="px-6 py-3">Resolved On</th>
                                <th class="px-6 py-3">Category</th>
                                <th class="px-6 py-3 rounded-tr-md">Resolution Note</th>
                            </tr>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            <tr class="bg-white shadow-sm hover:shadow-md transition rounded-md">
                                <td class="px-6 py-4 font-medium text-gray-800">LOST ID IN 4TH FLOOR</td>
                                <td class="px-6 py-4 text-[13px] text-gray-500">June 20, 6:30 PM</td>
                                <td class="px-6 py-4 italic text-[13px] text-gray-700">Faculties</td>
                                <td class="px-6 py-4 text-[13px] text-gray-600">ID turned in to Admin Office.</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--SUBMIT COMPLAINT--}}
                <div class="row-start-3 lg:col-span-2 lg:col-start-3 lg:row-span-2 bg-gray-100 p-4 rounded bg-white">
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
                    {{--Status--}}
                    <div class="card w-full bg-base-100 card-md shadow-sm mt-10 bg-white">
                        <div class="card-body">
                            <h2 class="card-title text-button">Status (Recently updated)</h2>
                            <p class="text-secondary-gray text-[10px] font-semibold">{{empty($complaintData) ? 'No recent updates' : 'Updated ' . Carbon::parse($complaintData->updated_at)->diffForHumans()}}</p>
                            <div class="w-full border-t-2 border-[#E7C01D] mb-3"></div>
                            <div class="flex flex-col sm:flex-row gap-4 justify-start items-start card-actions">

                                {{-- Pending --}}
                                <div
                                    class="flex items-center gap-3 bg-yellow-100 border border-yellow-300 text-yellow-800 rounded-lg px-4 py-2 shadow w-full sm:w-1/2">
                                    <i class="fa-solid fa-spinner animate-spin text-lg"></i>
                                    <div class="flex flex-col">
                                        <span class="font-semibold text-sm">Pending</span>
                                        <span class="text-xs">{{ $countPending }} complaints</span>
                                    </div>
                                </div>

                                {{-- Resolved --}}
                                <div
                                    class="flex items-center gap-3 bg-green-100 border border-green-300 text-green-800 rounded-lg px-4 py-2 shadow w-full sm:w-1/2">
                                    <i class="fa-solid fa-check text-lg"></i>
                                    <div class="flex flex-col">
                                        <span class="font-semibold text-sm">Resolved</span>
                                        <span class="text-xs">1 complaints</span>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @include('Components.AuthFooter')
        </x-Section>
    </x-HomeNavigationBar>
</x-Layout>
