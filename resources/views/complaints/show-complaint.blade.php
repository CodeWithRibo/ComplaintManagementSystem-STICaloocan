<x-Layout>
    <x-HomeNavigationBar>
    <x-Section>
        <!-- 🔍 Filters with Search Bar -->
        <x-Search header="Edit Complaint">
            <form action="{{route('search')}}" method="GET">
                @csrf
                <div class="relative">
                    <input type="text" id="search" name="search"
                           value="{{request()->get('search')}}"
                           class="input input-bordered w-full pl-10 text-sm"
                           placeholder="Search by title or tracker...">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-gray-400 text-sm"></i>
                </div>
            </form>
        </x-Search>
        <div class="px-4">
            <table
                class="w-full table-auto text-sm text-left border-separate border-spacing-y-2 overflow-x-hidden">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-6 py-3 rounded-tl-md">Title</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Priority</th>
                    <th class="px-6 py-3 rounded-tr-md">Complaint Tracker</th>
                    <th class="px-6 py-3 rounded-tr-md">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($complaintData as $data)
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
                        <td class="px-6 py-4 italic text-[13px] text-gray-700">{{$data->complaint_tracker}}</td>
                        <td>
                            <a href="{{route('complaints.edit', $data->id)}}">
                                <button class="btn btn-secondary px-5"
                                        type="button">Edit Complaint
                                </button>
                            </a>
                        </td>
                        @empty
                            @if(request()->has('search'))
                                <td colspan="6" class="text-2xl text-gray-500 text-center italic">No Complaint found for  <span class="text-accent">{{request()->get('search')}}</span></td>
                            @else
                                <td colspan="6" class="text-2xl text-gray-500 text-center italic">
                                    No complaints have been submitted yet.
                                </td>
                            @endif
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </x-Section>
    </x-HomeNavigationBar>
</x-Layout>
