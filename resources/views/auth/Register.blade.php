<x-layout>
    <x-AuthNavigationBar>
        <div class="flex items-center justify-center min-h-screen py-20 sm:p-20 ">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <fieldset class="fieldset bg-base-200 border border-base-300 rounded-box">
                    <div class="flex items-center justify-center text-center flex-col">
                        <img src="{{asset('image/STI_LOGO_for_eLMS.png')}}" class="w-20" alt="">
                        <div class="w-full border-t-2 border-base-300 my-3"></div>
                        <h2 class="text-2xl text-base-content font-semibold">Signup</h2>
                    </div>
                    <div class="p-6 max-w-7xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            @if($errors->any())
                                <div role="alert" class="alert alert-error">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {{-- First Name --}}
                           <x-FormLayout type="input" value="{{old('first_name')}}" name="first_name" placeholder="Enter First Name">
                               First Name
                           </x-FormLayout>
                            <x-FormLayout type="input" value="{{old('last_name')}}" name="last_name" placeholder="Enter Last Name">
                                Last Name
                            </x-FormLayout>
                            {{-- Email --}}
                            <x-FormLayout type="email" value="{{old('email')}}" name="email" placeholder="Enter Email">
                                Email
                            </x-FormLayout>
                            {{-- Password --}}
                            <x-FormLayout type="password" name="password" placeholder="Enter Password">
                                Password
                            </x-FormLayout>
                            {{-- Confirm Password --}}
                            <x-FormLayout type="password" name="repeat_password" placeholder="Enter Confirm Password">
                                Confirm Password
                            </x-FormLayout>
                        </div>
                        <div>
                            {{-- Student ID Number --}}
                            <x-FormLayout type="input" value="{{old('student_id_number')}}" name="student_id_number" placeholder="Enter Student ID Number">
                                Student ID Number
                            </x-FormLayout>
                            {{-- Grade Level --}}
                            <x-SelectionLayout name="grade_level" label="Grade Level" disabledOption="Select your Grade Level">
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                            </x-SelectionLayout>
                            {{--Program--}}
                            <x-SelectionLayout name="program" label="Program" disabledOption="Select your Program">
                                <option value="BSIT">BSIT - Information Technology</option>
                                <option value="BSBA">BSBA - Business Accountancy</option>
                                <option value="BSHM">BSHM - Hospitality Management</option>
                                <option value="BSTM">BSTM - Tourism Management</option>
                            </x-SelectionLayout>
                            {{--Contact Number--}}
                            <x-FormLayout type="input"  value="{{old('contact_number')}}" name="contact_number" placeholder="Enter Contact Number">
                                Contact Number (Optional)
                            </x-FormLayout>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-neutral mt-6 w-full">Signup</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </x-AuthNavigationBar>
</x-layout>
