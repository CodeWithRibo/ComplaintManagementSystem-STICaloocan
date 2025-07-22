@php use Illuminate\Support\Carbon; @endphp

<x-Layout>
    <x-admin.navigation-bar>
        <x-Section>
            <div class="overflow-x-auto rounded-xl shadow-md border border-gray-200 mx-20 mt-20">
                <h1 class="text-base-content text-2xl p-2 my-5 text-center xl:text-start border-l-4 border-primary bg-base-100 shadow-sm rounded-r-lg w-auto xl:w-96">Complaints Log</h1>

                <table class="table-auto w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 uppercase text-gray-600 text-xs">
                    <tr>
                        <th class="px-6 py-3">Causer ID</th>
                        <th class="px-6 py-3">Description</th>
                        <th class="px-6 py-3">Created At</th>
                        <th class="px-6 py-3">Updated At</th>
                    </tr>
                    </thead>
                    <tbody class="">
                    @forelse($logs as $log)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $log->causer_id }}</td>
                            <td class="px-6 py-4">{{ $log->description }}</td>
                            <td class="px-6 py-4">{{Carbon::parse($log->created_at)->format('F jS, Y g:i A') }}</td>
                            <td class="px-6 py-4">{{Carbon::parse($log->updated_at)->format('F jS, Y g:i A') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-gray-500 italic py-6">
                                No logs found.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </x-Section>
    </x-admin.navigation-bar>
</x-Layout>
