<x-layout>
    <x-AuthNavigationBar>
        <div class="flex items-center justify-center min-h-screen py-20 sm:p-20 ">
            <form action="{{$action}}" method="POST">
                @csrf
                <fieldset class="fieldset bg-base-200 border border-base-300 rounded-box">
                    <div class="flex items-center justify-center text-center flex-col">
                        <img src="{{asset('image/STI_LOGO_for_eLMS.png')}}" class="w-20" alt="">
                        <div class="w-full border-t-2 border-base-300 my-3"></div>
                        <h2 class="text-2xl text-base-content font-semibold">Signup</h2>
                    </div>
                    <div class="p-6 max-w-7xl mx-auto">
                        <div class="{{$class}}">
                            <div>
                                <x-FormLayout type="text" value="{{old('first_name')}}" name="first_name" placeholder="e.g., Juan" label="First Name"/>
                                <x-FormLayout type="text" value="{{old('last_name')}}" name="last_name" placeholder="e.g., Dela Cruz" label="Last Name"/>
                                <x-FormLayout type="email" value="{{old('email')}}" name="email" placeholder="e.g., juan.delacruz@gmail.com" label="Email"/>
                                <x-FormLayout type="password" name="password" placeholder="Enter Password" label="Password"/>
                                <x-FormLayout type="password" name="repeat_password" placeholder="Enter Confirm Password" label="Confirm Password"/>
                            </div>
                            @if(!empty($otherDetails))
                            <div>
                                <x-FormLayout type="text" value="{{old('student_id_number')}}" name="student_id_number" placeholder="e.g., 02000411496" label="Student ID Number"/>
                                <x-SelectionLayout name="grade_level" label="Grade Level" disabledOption="Select your Grade Level">
                                    <option value="1st Year" @selected(old('grade_level') === '1st Year')>1st Year</option>
                                    <option value="2nd Year" @selected(old('grade_level') === '2nd Year')>2nd Year</option>
                                    <option value="3rd Year" @selected(old('grade_level') === '3rd Year')>3rd Year</option>
                                    <option value="4th Year" @selected(old('grade_level') === '4th Year')>4th Year</option>
                                </x-SelectionLayout>
                                <x-SelectionLayout name="program" label="Program" disabledOption="Select your Program">
                                    <option value="BS IN INFORMATION TECHNOLOGY" @selected(old('program') === 'BS IN INFORMATION TECHNOLOGY')>BS IN INFORMATION TECHNOLOGY</option>
                                    <option value="BS IN BUSINESS ACCOUNTANCY" @selected(old('program') === 'BS IN BUSINESS ACCOUNTANCY')>BS IN BUSINESS ACCOUNTANCY</option>
                                    <option value="BS IN HOSPITALITY MANAGEMENT" @selected(old('program') === 'BS IN HOSPITALITY MANAGEMENT')>BS IN HOSPITALITY MANAGEMENT</option>
                                    <option value="BS IN TOURISM MANAGEMENT" @selected(old('program') === 'BS IN TOURISM MANAGEMENT')>BS IN TOURISM MANAGEMENT</option>
                                </x-SelectionLayout>
                                <x-FormLayout type="text" value="{{old('section')}}" name="section" placeholder="e.g., BT-207" label="Section"/>
                                @endif
                                <x-FormLayout type="text" value="{{old('contact_number')}}" name="contact_number" placeholder="Enter Contact Number" label=" Contact Number (Optional)"/>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-neutral mt-6 w-full">Signup</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </x-AuthNavigationBar>
</x-layout>
