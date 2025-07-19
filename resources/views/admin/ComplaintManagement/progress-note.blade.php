<x-Layout>
    <x-admin.navigation-bar>
        <x-Section>
            <div class="flex items-center justify-center min-h-[80vh]">
                <div class="w-full max-w-2xl bg-white p-8 rounded-lg shadow-lg ">
                    <h2 class="text-2xl font-bold text-base-content mb-4">
                        📝 Progress note
                    </h2>
                    <p class="text-blue-700 font-bold">Author: <span class="text-gray-700">{{empty($complaint->full_name) ? 'Anonymous' : $complaint->full_name}}</span></p>
                    <p class="text-red-700 font-bold">Complaint Tracker: <span class="text-gray-700">{{$complaint->complaint_tracker}}</span></p>
                    <br>
                    <form action="{{route('admin.progress-note', $complaint->id)}}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <x-FormLayout inputField="textarea"
                                      name="progress_note"
                                      placeholder="Write your progress note here..."
                                      label="Progress Note"
                                      rows="5">
                        </x-FormLayout>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary text-white">
                                Submit note
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </x-Section>
        @include('Components.AuthFooter')
    </x-admin.navigation-bar>
</x-Layout>
