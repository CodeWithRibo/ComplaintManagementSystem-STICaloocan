<x-Layout>
    <x-admin.navigation-bar>
        <x-Section>
            <div class="flex items-center justify-center min-h-[80vh]">
                <div class="w-full max-w-2xl bg-white p-8 rounded-lg shadow-lg ">
                    <h2 class="text-2xl font-bold text-base-content mb-4">
                        📝 Add Resolution Note
                    </h2>
                    <form action="{{route('admin.resolution-note', $complaint->id)}}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <div>

                        </div>
                        <x-FormLayout inputField="textarea"
                                      name="resolution_note"
                                      placeholder="Write your resolution here..."
                                      label="Resolution Note"
                                      rows="5">
                        </x-FormLayout>
                        <div>
                            <x-FormLayout type="datetime-local"
                                          name="resolved_on"
                                          label="Resolved On"/>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary text-white">
                                Submit Resolution
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </x-Section>
        @include('Components.AuthFooter')
    </x-admin.navigation-bar>
</x-Layout>
