<x-Layout>
    <x-NavigationBar>
        <x-Section>
            <div class="flex items-center justify-center min-h-screen py-20 sm:p-20 ">
                <form action="{{route('admin.register')}}" method="POST">
                    @csrf
                    <fieldset class="fieldset bg-base-200 border border-base-300 rounded-box">
                        <div class="flex items-center justify-center text-center flex-col">
                            <img src="{{asset('image/STI_LOGO_for_eLMS.png')}}" class="w-20" alt="">
                            <div class="w-full border-t-2 border-base-300 my-3"></div>
                            <h2 class="text-2xl text-base-content font-semibold">Register</h2>
                        </div>
                        <div class="p-6 max-w-7xl mx-auto">
                            <div class="grid grid-cols-1 md:grid-cols-1 gap-5">
                                <div>
                                    <x-FormLayout type="text" value="{{old('first_name')}}" name="first_name" placeholder="e.g., Juan" label="First Name"/>
                                    <x-FormLayout type="text" value="{{old('last_name')}}" name="last_name" placeholder="e.g., Dela Cruz" label="Last Name"/>
                                    <x-FormLayout type="email" value="{{old('email')}}" name="email" placeholder="e.g., juan.delacruz@gmail.com" label="Email"/>
                                    <x-FormLayout type="password" name="password" placeholder="Enter Password" label="Password"/>
                                    <x-FormLayout type="password" name="repeat_password" placeholder="Enter Confirm Password" label="Confirm Password"/>
                                </div>
                                        <x-FormLayout type="text" value="{{old('contact_number')}}" name="contact_number" placeholder="Enter Contact Number" label=" Contact Number (Optional)"/>
                            </div>
                            <button type="submit" class="btn btn-neutral mt-6 w-full">Submit</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </x-Section>
    </x-NavigationBar>
</x-Layout>
