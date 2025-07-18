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
            <x-ModalDetails label="Resolution Note"
                            x-text="selectedComplaint?.resolution_note || '-'"/>
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
