<x-layout>
    <x-HomeNavigationBar>
        <section :class="open ? 'md:ml-[300px]' : 'md:ml-20'" class="transition-all duration-300">
            <div class="flex items-center justify-center min-h-screen py-20 sm:p-20 mx-auto max-w-5xl ">
                <form action="{{route('complaints.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="fieldset  bg-base-200 border border-base-300 rounded-box">
                        <div class="flex items-center justify-center text-center flex-col">
                            <img src="{{asset('image/STI_LOGO_for_eLMS.png')}}" class="w-20" alt="">
                            <div class="w-full border-t-2 border-base-300 my-3"></div>
                            <h2 class="text-2xl text-base-content font-semibold">Submit Complaint</h2>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div x-data=" {open: false } ">
{{--Category--}}
                                    <x-SelectionLayout type="select" name="category" label="Category"
                                                       disabledOption="Select Category">
                                        <option value="Facilities" @click="open = true">Facilities</option>
                                        <option value="Faculty" @click="open = false">Faculty</option>
                                        <option value="Admission" @click="open = false">Admission</option>
                                        <option value="Cashier" @click="open = false">Cashier</option>
                                        <option value="Registrar" @click="open = false">Registrar</option>
                                    </x-SelectionLayout>
{{--Additional Quesiton, Location Details--}}
                                    <span x-show="open">
                                    <x-FormLayout type="text" name="location"
                                                  placeholder="e.g., Computer Laboratory 601"
                                                  label="Location Details">
                                    </x-FormLayout>
                                    </span>
{{--Title--}}
                                    <x-FormLayout type="text" value="{{old('title')}}" name="title"
                                                  placeholder="e.g., Broken Chair in Room 405"
                                                  label="Title of the Complaint">
                                    </x-FormLayout>
{{--Desciption--}}
                                    <x-FormLayout inputField="textarea" value="{{old('description')}}"
                                                  name="description"
                                                  placeholder="Describe the issue in detail..."
                                                  label="Detailed Description">
                                    </x-FormLayout>
{{--Incident Time--}}
                                    <x-FormLayout type="datetime-local" value="{{old('incident_time')}}"
                                                  name="incident_time" label="Date and Time of the Incident">
                                    </x-FormLayout>
                                </div>
                                <div x-data="{open: false}">
{{--Priority--}}
                                    <x-SelectionLayout type="select" name="priority" label="Priority Level"
                                                       disabledOption="Select priority level">
                                        <option value="Low">Low - Minor issue, not urgent</option>
                                        <option value="Medium">Medium - Need attention, moderate urgency</option>
                                        <option value="High">High - Serious or urgent matter</option>
                                    </x-SelectionLayout>
{{--Upload Image--}}
                                    <x-FormLayout type="file" value="{{old('image_path')}}" name="image_path" accept=".jpg,.jpeg,.png"
                                                  label="Attach Image or Screenshot (Optional)">

                                    </x-FormLayout>
                                    <small class="text-gray-500 text-[12px]">Upload a screenshot or photo to support
                                        your
                                        complaint (max 5MB).</small>
{{--Contact Information Identified or Anonymous--}}
                                    <x-SelectionLayout type="select" name="type_submit" label="Submission Type"
                                                       disabledOption="Select type">
                                        <option value="Identified" @click="open = true">I will provide my contact
                                            information
                                        </option>
                                        <option value="Anonymous " @click="open = false">Do not display my name or
                                            student id
                                        </option>
                                    </x-SelectionLayout>
 {{--Identified Contact Information--}}
                                    <span x-show="open">
                                    <x-FormLayout type="text" name="full_name"
                                                  placeholder="e.g., Juan Dela Cruz"
                                                  label="Full Name">
                                    </x-FormLayout>
                                    <x-FormLayout type="text" name="student_id_number"
                                                  placeholder="e.g., 02000411432"
                                                  label="Student ID">
                                    </x-FormLayout>
                                    <x-FormLayout type="email" name="email"
                                                  placeholder="e.g., juandelacruz@sti.caloocan.edu.ph"
                                                  label="Email Address">
                                    </x-FormLayout>
                                    <x-FormLayout type="text" name="phone_number"
                                                  placeholder="e.g., 0912-345-6789"
                                                  label="Mobile Number (Optional)">
                                    </x-FormLayout>
                                    <x-FormLayout type="text" name="year_and_section"
                                                  placeholder="e.g., 1st year -  BT-207"
                                                  label="Year & Section">
                                    </x-FormLayout>
                                    </span>
                                    <small class="text-gray-500 text-[12px]">
                                        Choose whether to include your contact information. You may remain anonymous if
                                        you prefer </small>
                                    <br>
{{--Consent Given--}}
                                    <div class="mt-5">
                                        <input type="checkbox" name="consent_given" value="1">
                                        <label for="consent_given" class="text-base-content">I agree that my complaint
                                            and personal information may be reviewed by the admin team
                                            for investigation purposes.</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-neutral mt-6 w-full">Submit Complaint</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </section>
    </x-HomeNavigationBar>
</x-layout>
