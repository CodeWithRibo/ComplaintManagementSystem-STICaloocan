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
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Filter by Status</label>
                    <select id="status" class="select select-bordered w-40 text-sm">
                        <option>All</option>
                        <option>Pending</option>
                        <option>Resolved</option>
                    </select>
                </div>
                <!-- Filter: Priority -->
                <div>
                    <label for="priority" class="block text-sm font-medium text-gray-700 mb-1">Filter by Priority</label>
                    <select id="priority" class="select select-bordered w-40 text-sm">
                        <option>All</option>
                        <option>Low</option>
                        <option>Medium</option>
                        <option>High</option>
                    </select>
                </div>
            </div>
            <!-- 📋 Complaints Table -->
            <div x-data="{modalIsOpen: false}">
            <div class="px-4">
                <table class="w-full table-auto text-sm text-left border-separate border-spacing-y-2 overflow-x-hidden">
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
                                <span class="inline-flex items-center gap-1 text-xs font-semibold text-yellow-800 bg-yellow-100 px-3 py-1 rounded-full">
                                    <i class="fa-solid fa-spinner animate-spin text-yellow-600"></i>
                                    Pending
                                </span>
                            </td>
                            <td class="px-6 py-4 text-xs font-semibold text-gray-700">{{$data->priority}}</td>
                            <td class="px-6 py-4 text-[13px] text-gray-500">{{Carbon::parse($data->created_at)->format('F jS, Y g:i A')}}</td>
                            <td class="px-6 py-4 italic text-[13px] text-gray-700">{{$data->complaint_tracker}}</td>
                            <td><button class="btn btn-secondary px-5" x-on:click="modalIsOpen = true" type="button">View Complaint</button> </td>
                        </tr>
                        <!-- Modal -->
                        <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" x-on:keydown.esc.window="modalIsOpen = false" x-on:click.self="modalIsOpen = false"
                             class="fixed inset-0 z-50 flex items-center justify-center bg-black/20 p-4 backdrop-blur-md" role="dialog" aria-modal="true" aria-labelledby="complaintModalTitle">

                            <!-- Modal Content -->
                            <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
                                 class="w-full max-w-6xl fixed z-50 h-full max-h-[95vh] overflow-y-auto rounded-xl bg-white shadow-lg dark:bg-gray-800">

                                <!-- Header -->
                                <div class="sticky top-0 z-10 flex items-center justify-between border-b px-6 py-4 bg-white dark:bg-gray-800 dark:border-gray-700">
                                    <h3 id="complaintModalTitle" class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                        Complaint Details
                                    </h3>
                                    <button x-on:click="modalIsOpen = false" aria-label="Close">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" class="w-5 h-5 text-gray-500 hover:text-gray-700 dark:text-gray-300">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Body -->
                                <div class="px-6 py-6 space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-xs font-medium text-gray-500 dark:text-gray-400">Title</label>
                                            <p class="text-sm font-semibold text-gray-800 dark:text-white">...</p>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-gray-500 dark:text-gray-400">Category</label>
                                            <p class="text-sm text-gray-700 dark:text-gray-300">...</p>
                                        </div>
                                        <div class="md:col-span-2">
                                            <label class="block text-xs font-medium text-gray-500 dark:text-gray-400">Description</label>
                                            <p class="text-sm text-gray-700 dark:text-gray-300">...</p>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-gray-500 dark:text-gray-400">Location</label>
                                            <p class="text-sm text-gray-700 dark:text-gray-300">...</p>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-gray-500 dark:text-gray-400">Incident Time</label>
                                            <p class="text-sm text-gray-700 dark:text-gray-300">...</p>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-gray-500 dark:text-gray-400">Priority</label>
                                            <p class="text-sm text-gray-700 dark:text-gray-300">...</p>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-gray-500 dark:text-gray-400">Status</label>
                                            <p class="text-sm text-gray-700 dark:text-gray-300">...</p>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-gray-500 dark:text-gray-400">Complaint Tracker</label>
                                            <p class="text-sm text-gray-700 dark:text-gray-300">...</p>
                                        </div>
                                        <div class="md:col-span-2">
                                            <label class="block text-xs font-medium text-gray-500 dark:text-gray-400">Attached Image</label>
                                            <div class="mt-2 h-40 rounded bg-gray-100 flex items-center justify-center text-gray-400 text-xs dark:bg-gray-700 dark:text-gray-300">
                                                No image uploaded
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-t pt-4">
                                        <h4 class="text-sm font-semibold text-gray-700 dark:text-white mb-3">Submitter Information</h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-xs font-medium text-gray-500 dark:text-gray-400">Name</label>
                                                <p class="text-sm text-gray-700 dark:text-gray-300">...</p>
                                            </div>
                                            <div>
                                                <label class="block text-xs font-medium text-gray-500 dark:text-gray-400">Student ID</label>
                                                <p class="text-sm text-gray-700 dark:text-gray-300">...</p>
                                            </div>
                                            <div>
                                                <label class="block text-xs font-medium text-gray-500 dark:text-gray-400">Email</label>
                                                <p class="text-sm text-gray-700 dark:text-gray-300">...</p>
                                            </div>
                                            <div>
                                                <label class="block text-xs font-medium text-gray-500 dark:text-gray-400">Phone</label>
                                                <p class="text-sm text-gray-700 dark:text-gray-300">...</p>
                                            </div>
                                            <div class="md:col-span-2">
                                                <label class="block text-xs font-medium text-gray-500 dark:text-gray-400">Year & Section</label>
                                                <p class="text-sm text-gray-700 dark:text-gray-300">...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Footer -->
                                <div class="sticky bottom-0 flex justify-end border-t px-6 py-4 bg-white dark:bg-gray-800 dark:border-gray-700">
                                    <button x-on:click="modalIsOpen = false" type="button"
                                            class="rounded-md bg-gray-200 px-4 py-2 text-sm font-medium text-gray-800 hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>


                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </x-HomeNavigationBar>
</x-Layout>
