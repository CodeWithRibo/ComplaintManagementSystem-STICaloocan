@php use Illuminate\Support\Carbon; @endphp
<x-Layout>
    <x-HomeNavigationBar>
        <x-Section>
            <!-- 🔍 Filters with Search Bar -->
            <x-Search :header="$header">
                <form action="{{route('search')}}" method="GET">
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
            <!-- 📋 Complaints Table -->
            <div x-data="{modalIsOpen: false, selectedComplaint: null}">
                <div class="px-4">
                    <table
                        class="w-full table-auto text-sm text-left border-separate border-spacing-y-2 overflow-x-hidden">
                        <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-6 py-3 rounded-tl-md">Title</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Priority</th>
                            <th class="px-6 py-3">Submitted</th>
                            <th class="px-6 py-3 rounded-tr-md">Complaint Tracker</th>
                            <th class="px-6 py-3 rounded-tr-md">Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($complaints as $data)
                            <tr class="bg-white shadow-sm hover:shadow-md transition rounded-md">
                                <td class="px-6 py-4 font-medium text-gray-800">{{$data->title}}</td>
                                <td class="px-6 py-4">
                                    @if($data->status == 'Resolved')
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
                                <td class="px-6 py-4 text-xs font-semibold text-gray-700">{{$data->priority}}</td>
                                <td class="px-6 py-4 text-[13px] text-gray-500">{{Carbon::parse($data->created_at)->format('F jS, Y g:i A')}}</td>
                                <td class="px-6 py-4 italic text-[13px] text-gray-700">{{$data->complaint_tracker}}</td>
                                <td>
                                    <button class="btn btn-secondary px-5"
                                            @click="modalIsOpen = true; selectedComplaint = {{json_encode($data)}} "
                                            type="button">View Complaint
                                    </button>
                                </td>
                                @empty
                                    @if(request()->has('search'))
                                        <td colspan="6" class="text-2xl text-gray-500 text-center italic">No Complaint
                                            found for <span class="text-accent">{{request()->get('search')}}</span></td>
                                    @else
                                        <td colspan="6" class="text-2xl text-gray-500 text-center italic">
                                            No complaints have been submitted yet.
                                        </td>
                                    @endif
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $complaints->links() }}
                    <x-ModalHeader>
                        <!-- Body -->
                        <div class="px-6 py-6 space-y-4" x-show="selectedComplaint">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                {{--Details--}}
                                <x-ModalDetails label="Title" x-text="selectedComplaint?. title || '-'"/>
                                <x-ModalDetails label="Category" x-text="selectedComplaint?.category || '-'"/>
                                <x-ModalDetails label="Description" x-text="selectedComplaint?.description || '-'"/>
                                <x-ModalDetails label="Location" x-text="selectedComplaint?.location || '-' "/>
                                <x-ModalDetails label="Incident Time" x-text="selectedComplaint?.incident_time || '-'"/>
                                <x-ModalDetails label="Priority" x-text="selectedComplaint?.priority || '-'"/>
                                <x-ModalDetails label="Status" x-text="selectedComplaint?.status || '-'"/>
                                <x-ModalDetails label="Complaint Tracker"
                                                x-text="selectedComplaint?.complaint_tracker || '-'"/>
                                {{--Image--}}
                                <x-ModalAttachedImage label="Attached Image"
                                                      x-text="selectedComplaint?.image_path || 'No Attached Image'">
                                    <img :src="'{{asset('student_complaint_image')}}/' + selectedComplaint?.image_path"
                                         alt="Attached Image"
                                         x-show="selectedComplaint?.image_path"
                                         class="h-full w-auto object-contain cursor-zoom-in rounded"
                                         @click="window.open($el.src, '_blank')">
                                </x-ModalAttachedImage>
                            </div>
                            <div class="border-t pt-4">
                                <h4 class="text-sm font-semibold text-gray-700 dark:text-white mb-3">Submitter
                                    Information</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4"
                                     x-show=!selectedComplaint?.is_anonymous>
                                    {{--Submitter Information--}}
                                    <x-ModalSubmitterInfo label="Name" x-text="selectedComplaint?.full_name || '-'"/>
                                    <x-ModalSubmitterInfo label="Student ID"
                                                          x-text="selectedComplaint?.student_id_number || '-'"/>
                                    <x-ModalSubmitterInfo label="Email" x-text="selectedComplaint?.email || '-'"/>
                                    <x-ModalSubmitterInfo label="Phone"
                                                          x-text="selectedComplaint?.phone_number || '-' "/>
                                    <div class="md:col-span-2">
                                        <x-ModalSubmitterInfo label="Year & Section"
                                                              x-text="selectedComplaint?.year_section || '-'"/>
                                    </div>
                                </div>
                                <div class="border-t pt-4" x-show="selectedComplaint?.is_anonymous">
                                    <p class="text-gray-500 italic">This complaint was submitted anonymously.</p>
                                </div>
                            </div>
                        </div>
                    </x-ModalHeader>
                </div>
            </div>
        </x-Section>
    </x-HomeNavigationBar>
</x-Layout>
