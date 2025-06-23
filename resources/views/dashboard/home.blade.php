<x-Layout>
    <x-HomeNavigationBar>
        {{-- Main Content Area --}}
        <section :class="open ? 'md:ml-[300px]' : 'md:ml-20'" class="pt-16 transition-all duration-300">
            <div class="grid lg:grid-cols-4 lg:grid-rows-2 grid-cols-1 grid-rows-2 gap-4 px-4 pt-5">
                {{--COMPLAINTS--}}
                <div class="rounded lg:col-span-2 shadow-lg bg-[#F7F7F7]">
                    <div class="card-title py-2 flex px-4">
                        <div class="flex-1">
                            <h1 class="text-button">Complaints (Recently updated)</h1>
                            <p class="text-secondary-gray text-[10px] font-semibold">Updated 2 hours ago</p>
                        </div>
                        <div class="flex-none">
                            <span class="text-secondary-gray text-base font-semibold">See All</span>
                        </div>
                    </div>
                    <div class="w-full border-t-2 border-[#E7C01D] mb-3"></div>
                    <div class="card-body bg-white rounded shadow overflow-x-hidden ">
                        <table class="text-left text-sm w-full table-auto ">
                            <!-- Table head -->
                            <thead class="uppercase tracking-wider border-b-2 border-gray-200">
                            <tr>
                                <th class="px-6 py-4">Title</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Submitted</th>
                                <th class="px-6 py-4">Category</th>
                            </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                            <tr class="border-b border-gray-100">
                                <td class="px-6 py-4 font-semibold">LOST ID IN 4TH FLOOR</td>
                                <td class="px-6 py-4">
                                    <span class="badge bg-yellow-300 text-xs px-2 py-1 rounded">Pending</span>
                                </td>
                                <td class="px-6 py-4 text-[13px] text-gray-600">June 20, 4:42 PM</td>
                                <td class="px-6 py-4 italic text-[13px] text-gray-700">Faculties</td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="" class="text-center text-blue-500 text-[11px] mt-1">View Details</a>
                    </div>

                </div>
                {{--RESOLVED COMPLAINT--}}
                <div class="row-start-2 lg:col-span-2 bg-gray-100 rounded">
                    <div class="card-title py-2 flex px-4">
                        <div class="flex-1">
                            <h1 class="text-button">Resolved Complaint (Recently updated)</h1>
                            <p class="text-secondary-gray text-[10px] font-semibold">Updated 13 hours ago</p>
                        </div>
                        <div class="flex-none">
                            <span class="text-secondary-gray text-base font-semibold">See All</span>
                        </div>
                    </div>
                    <div class="w-full border-t-2 border-[#E7C01D] mb-3"></div>
                    <div class=" card-body bg-white rounded shadow overflow-x-hidden">
                        <table class="table-auto w-full border-collapse text-left text-sm">
                            <thead class="uppercase tracking-wider border-b-2 border-gray-200">
                            <tr>
                                <th class="px-6 py-4">Title</th>
                                <th class="px-6 py-4">Resolved On</th>
                                <th class="px-6 py-4">Category</th>
                                <th class="px-6 py-4">Resolution Note</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="border-b border-gray-100">
                                <td class="px-6 py-4 font-semibold">LOST ID IN 4TH FLOOR</td>
                                <td class="px-6 py-4 text-[13px] text-gray-600">June 20, 6:30 PM</td>
                                <td class="px-6 py-4 italic text-[13px] text-gray-700">Faculties</td>
                                <td class="px-6 py-4 text-[12px] text-gray-600">ID turned in to Admin Office.</td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="" class="text-center text-blue-500 text-[11px] mt-1">View Details</a>
                    </div>
                </div>
                {{--SUBMIT COMPLAINT--}}
                <div class="row-start-3 lg:col-span-2 lg:col-start-3 lg:row-span-2 bg-gray-100 p-4 rounded">
                    <div class="hero bg-base-200">
                        <div class="hero-content text-center">
                            <div class="max-w-md">
                                <h1 class="text-5xl font-bold">Need Help? We're Listening</h1>
                                <p class="py-6">
                                    Ready to Submit a Concern? Click here to submit a new complaint. We’ve got you
                                    covered!
                                </p>
                                <a href="{{route('complaints.create')}}" type="button" class="btn btn-primary">Submit Complaint</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </x-HomeNavigationBar>
</x-Layout>
