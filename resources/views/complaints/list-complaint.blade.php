@php use Illuminate\Support\Carbon; @endphp
<x-Layout>
    <x-HomeNavigationBar>
        <section :class="open ? 'md:ml-[300px]' : 'md:ml-20'" class="pt-16 transition-all duration-300">
            <!-- 🔍 Filters with Search Bar -->
            <div class="flex flex-wrap justify-between items-center gap-4 mb-4 px-4 pt-5">
                <!-- Search Input -->
                <div class="w-full md:w-1/3">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search Complaints</label>
                    <div class="relative">
                        <input type="text" id="search" name="search"
                               class="input input-bordered w-full pl-10 text-sm"
                               placeholder="Search by title or tracker...">
                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-gray-400 text-sm"></i>
                    </div>
                </div>
                <!-- Filter: Status -->
                <x-Filter label="Filter by Status">
                    <option>All</option>
                    <option>Pending</option>
                    <option>Resolved</option>
                </x-Filter>
                <!-- Filter: Priority -->
                <x-Filter label="Filter by Priority">
                    <option>All</option>
                    <option>Low</option>
                    <option>Medium</option>
                    <option>High</option>
                </x-Filter>
            </div>
            <!-- 📋 Complaints Table -->
            <div x-data="{modalIsOpen: false}">
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
                        @foreach($complaintData as $data)
                            <tr class="bg-white shadow-sm hover:shadow-md transition rounded-md">
                                <td class="px-6 py-4 font-medium text-gray-800">{{$data->title}}</td>
                                <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1 text-xs font-semibold text-yellow-800 bg-yellow-100 px-3 py-1 rounded-full">
                                    <i class="fa-solid fa-spinner animate-spin text-yellow-600"></i>
                                    Pending
                                </span>
                                </td>
                                <td class="px-6 py-4 text-xs font-semibold text-gray-700">{{$data->priority}}</td>
                                <td class="px-6 py-4 text-[13px] text-gray-500">{{Carbon::parse($data->created_at)->format('F jS, Y g:i A')}}</td>
                                <td class="px-6 py-4 italic text-[13px] text-gray-700">{{$data->complaint_tracker}}</td>
                                <td>
                                    <button class="btn btn-secondary px-5" x-on:click="modalIsOpen = true"
                                            type="button">View Complaint
                                    </button>
                                </td>
                            </tr>
                            <x-Modal>
                                <!-- Body -->
                                <div class="px-6 py-6 space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        {{--Details--}}
                                        <x-ModalDetails label="Title">...</x-ModalDetails>
                                        <x-ModalDetails label="Category">...</x-ModalDetails>
                                        <x-ModalDetails label="Description">...</x-ModalDetails>
                                        <x-ModalDetails label="Location">...</x-ModalDetails>
                                        <x-ModalDetails label="Incident Time">...</x-ModalDetails>
                                        <x-ModalDetails label="Priority">...</x-ModalDetails>
                                        <x-ModalDetails label="Status">...</x-ModalDetails>
                                        <x-ModalDetails label="Complaint Tracker">...</x-ModalDetails>
                                        {{--Image--}}
                                        <x-ModalAttachedImage label="Attached Image">...</x-ModalAttachedImage>
                                    </div>

                                    <div class="border-t pt-4">
                                        <h4 class="text-sm font-semibold text-gray-700 dark:text-white mb-3">Submitter
                                            Information</h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            {{--Submitter Information--}}
                                            <x-ModalSubmitterInfo label="Name">...</x-ModalSubmitterInfo>
                                            <x-ModalSubmitterInfo label="Student ID">...</x-ModalSubmitterInfo>
                                            <x-ModalSubmitterInfo label="Email">...</x-ModalSubmitterInfo>
                                            <x-ModalSubmitterInfo label="Phone">...</x-ModalSubmitterInfo>
                                            <div class="md:col-span-2">
                                                <x-ModalSubmitterInfo label="Year & Section">...</x-ModalSubmitterInfo>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </x-Modal>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </x-HomeNavigationBar>
</x-Layout>
