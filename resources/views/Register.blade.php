<x-layout>
    <x-AuthNavigationBar>
        <div class="flex items-center justify-center min-h-screen py-20 sm:p-20 ">
            <form action="#" method="post">
                <fieldset class="fieldset bg-base-200 border border-base-300 rounded-box">
                    <div class="flex items-center justify-center text-center flex-col">
                        <img src="{{asset('image/STI_LOGO_for_eLMS.png')}}" class="w-20" alt="">
                        <div class="w-full border-t-2 border-base-300 my-3"></div>
                        <h2 class="text-2xl text-base-content font-semibold">Signup</h2>
                    </div>
                    <div class="p-6 max-w-7xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            {{-- First Name --}}
                           <x-FormLayout type="input" placeholder="First Name">
                               First Name
                           </x-FormLayout>
                            {{-- Last Name --}}
                            <x-FormLayout type="input" placeholder="Last Name">
                                Last Name
                            </x-FormLayout>
                            {{-- Email --}}
                            <x-FormLayout type="email" placeholder="Email">
                                Email
                            </x-FormLayout>
                            {{-- Password --}}
                            <x-FormLayout type="password" placeholder="Password">
                                Password
                            </x-FormLayout>
                            {{-- Confirm Password --}}
                            <x-FormLayout type="password" placeholder="Confirm Password">
                                Confirm Password
                            </x-FormLayout>
                        </div>
                        <div>
                            {{-- Student ID Number --}}
                            <x-FormLayout type="input" placeholder="Student ID Number">
                                Student ID Number
                            </x-FormLayout>
                            {{-- Grade Level --}}
                            <x-FormLayout type="input" placeholder="Grade Level">
                                Grade Level
                            </x-FormLayout>
                            {{-- Program --}}
                            <div class="mb-2">
                                <label class="label">
                                    <span class="label-text">Program</span>
                                </label>
                                <select name="program" class="select select-bordered w-full" required>
                                    <option disabled selected>Select your program</option>
                                    <option value="BSIT">BSIT - Information Technology</option>
                                    <option value="BSBA">BSBA - Business Accountancy</option>
                                    <option value="BSHM">BSHM - Hospitality Management</option>
                                    <option value="BSTM">BSTM - Tourism Management</option>
                                </select>
                            </div>
                            {{-- Contact Number --}}
                            <x-FormLayout type="input" placeholder="Contact Number">
                                Contact Number
                            </x-FormLayout>
                        </div>
                    </div>
                        <button class="btn btn-neutral mt-6 w-full">Signup</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </x-AuthNavigationBar>
</x-layout>
