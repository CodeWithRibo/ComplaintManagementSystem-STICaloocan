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
                <div class="px-4 overflow-x-auto">
                    <table
                        class="w-full table-auto text-sm text-left border-separate border-spacing-y-2 overflow-x-auto">
                        <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-6 py-3 rounded-tl-md">Title</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Priority</th>
                            <th class="px-6 py-3">Submitted</th>
                            <th class="px-6 py-3 rounded-tr-md">Complaint Tracker</th>
                            @if(!empty($resolutionNote))
                                <th class="px-6 py-3 rounded-tr-md">{{$resolutionNote}}</th>
                            @endif
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
                                @if(!empty($resolutionNote))
                                    <td class="px-6 py-4 italic text-[13px] text-gray-700">Lorem ipsumm</td>
                                @endif
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
{{--Modal View Details--}}
                    <x-view-details-modal/>
                </div>
            </div>
        </x-Section>
    </x-HomeNavigationBar>
</x-Layout>
