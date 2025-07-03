<x-Layout>
    <x-HomeNavigationBar>
        <x-Section>
            <div class="flex items-center justify-center min-h-screen py-20 lg:p-20 mx-auto max-w-5xl ">
                <form action="{{route('complaints.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="fieldset  bg-base-200 border border-base-300 rounded-box px-10 py-10">
                        @if(session('warning'))
                            <div role="alert" class="mt-2 alert alert-error alert-soft fixed z-50 "> {{ session('warning')}}</div>
                        @endif
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
                                        <option value="Facilities"
                                                @click="open = true" @selected(old('category') === 'Facilities')>
                                            Facilities
                                        </option>
                                        <option value="Faculty"
                                                @click="open = false" @selected(old('category') === 'Faculty')>Faculty
                                        </option>
                                        <option value="Admission"
                                                @click="open = false" @selected(old('category') === 'Admission')>
                                            Admission
                                        </option>
                                        <option value="Cashier"
                                                @click="open = false" @selected(old('category') ===  'Cashier')>Cashier
                                        </option>
                                        <option value="Registrar"
                                                @click="open = false" @selected(old('category') === 'Registrar')>
                                            Registrar
                                        </option>
                                    </x-SelectionLayout>
                                    {{--Additional Quesiton, Location Details--}}
                                    <span x-show="open">
                                    <x-FormLayout type="text" name="location"
                                                  placeholder="e.g., Computer Laboratory 601"
                                                  label="Location Details">
                                    </x-FormLayout>
                                    </span>
                                    {{--Complaint Tracker--}}
                                    <input type="hidden" name="complaint_tracker">
                                    {{--Title--}}
                                    <x-FormLayout type="text" value="{{old('title')}}" name="title"
                                                  placeholder="e.g., Broken Chair in Room 405"
                                                  label="Title of the Complaint">
                                    </x-FormLayout>
                                    {{--Desciption--}}
                                    <x-FormLayout inputField="textarea"
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
                                        <option value="Low" @selected(old('priority') === 'Low')>Low - Minor issue, not
                                            urgent
                                        </option>
                                        <option value="Medium" @selected(old('priority') === 'Medium')>Medium - Need
                                            attention, moderate urgency
                                        </option>
                                        <option value="High" @selected(old('priority') === 'High')>High - Serious or
                                            urgent matter
                                        </option>
                                    </x-SelectionLayout>
                                    {{--Upload Image--}}
                                    <x-FormLayout type="file" value="{{old('image_path')}}" name="image_path"
                                                  accept=".jpg,.jpeg,.png"
                                                  label="Attach Image or Screenshot (Optional)">

                                    </x-FormLayout>
                                    <small class="text-gray-500 text-[12px]">Upload a screenshot or photo to support
                                        your
                                        complaint (max 5MB).</small>
                                    {{--Contact Information Identified or Anonymous--}}
                                    <x-SelectionLayout type="select" name="type_submit" label="Submission Type"
                                                       disabledOption="Select type">
                                        <option value="Identified"
                                                @click="open = true" @selected(old('type_submit') === 'Identified')>I
                                            will provide my contact
                                            information
                                        </option>
                                        <option value="Anonymous"
                                                @click="open = false" @selected(old('type_submit') === 'Anonymous')>Do
                                            not display my name or
                                            student id
                                        </option>
                                    </x-SelectionLayout>
                                    {{--Identified Contact Information--}}
                                    <span x-show="open">
                                    <x-FormLayout type="text" name="full_name"
                                                  placeholder="e.g., Juan Dela Cruz"
                                                  label="Full Name"
                                                  value="{{Auth::user()->first_name . ' ' . Auth::user()->last_name}} "
                                                  @class(['bg-gray-200 text-gray-500 cursor-not-allowed'])
                                                  readonly>
                                    </x-FormLayout>
                                    <x-FormLayout type="text" name="student_id_number"
                                                  placeholder="e.g., 02000411432"
                                                  label="Student ID"
                                                  value="{{Auth::user()->student_id_number}}"
                                                  @class(['bg-gray-200 text-gray-500 cursor-not-allowed'])
                                                  readonly>
                                    </x-FormLayout>
                                    <x-FormLayout type="email" name="email"
                                                  placeholder="e.g., juandelacruz@gmail.com"
                                                  label="Email Address"
                                                  value="{{Auth::user()->email}}"
                                                  @class(['bg-gray-200 text-gray-500 cursor-not-allowed'])
                                                  readonly>
                                    </x-FormLayout>
                                        @if(!empty(Auth::user()->contact_number))
                                            <x-FormLayout type="text" name="phone_number"
                                                          placeholder="e.g., 09123456789"
                                                          label="Mobile Number (Optional)"
                                                          value="{{Auth::user()->contact_number}}"
                                                          @class(['bg-gray-200 text-gray-500 cursor-not-allowed'])
                                                          readonly>
                                                </x-FormLayout>
                                                @else
                                            <x-FormLayout type="text" name="phone_number"
                                                          placeholder="e.g., 09123456789"
                                                          label="Mobile Number (Optional)">
                                                </x-FormLayout>
                                        @endif

                                    <x-FormLayout type="text" name="year_section"
                                                  placeholder="e.g., 1st year - BT-207"
                                                  label="Year & Section"
                                                  value="{{Auth::user()->grade_level . ' ' . Auth::user()->program . ' ' .  Auth::user()->section}}"
                                                  @class(['bg-gray-200 text-gray-500 cursor-not-allowed'])
                                                  readonly>
                                    </x-FormLayout>
                                    </span>
                                    <small class="text-gray-500 text-[12px]">
                                        Choose whether to include your contact information. You may remain anonymous if
                                        you prefer </small>
                                    <br>
                                    {{--Consent Given--}}
                                    <div class="mt-5">
                                        <input type="checkbox" name="consent_given" value="1"
                                               class="@error('consent_given') is-invalid @enderror">
                                        <label for="consent_given" class="text-base-content">I agree that my complaint
                                            and personal information may be reviewed by the admin team
                                            for investigation purposes.</label>
                                        @error('consent_given')
                                        <div role="alert"
                                             class=" mt-2 alert alert-error alert-soft"> {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-neutral mt-6 w-full">Submit Complaint</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </x-Section>
    </x-HomeNavigationBar>
</x-Layout>
