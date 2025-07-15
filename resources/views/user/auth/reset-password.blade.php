<x-Layout>
    <x-AuthNavigationBar>
        <div class="min-h-screen flex items-center justify-center px-4 relative z-0 sm:z-20">
            <div class="bg-white rounded-2xl shadow-lg max-w-md w-full p-10 text-center" x-data ="{passwordShow : false}">

                <div class="mb-6">
                    <img src="{{ asset('image/STI_LOGO_for_eLMS.png') }}" alt="Reset Password" class="mx-auto w-52 h-24 object-contain">
                </div>

                <h2 class="text-2xl font-bold text-button mb-2">Reset your password</h2>
                <p class="text-gray-600 mb-6 text-sm"> Please enter your email and set a new password</p>

                <form action="{{route('update-password')}}" method="POST" class="space-y-5 text-start">
                    @csrf
                    <x-FormLayout name="email" placeholder="Enter email" label="Email" />
                    <x-FormLayout name="password" placeholder="Enter password" label="Password"  x-bind:type="passwordShow ? 'text' : 'password'" />
                    <x-FormLayout name="password_confirmation" placeholder="Confirm Password" label="Confirm Password"  x-bind:type="passwordShow ? 'text' : 'password'" />
                    <input type="text" name="token" value="{{$token}}" hidden >
                    <div class="flex items-center gap-3">
                        <input type="checkbox" class="cursor-pointer" id="showPassword" @click="passwordShow = !passwordShow" >
                        <p class="text-gray-500">Show Password</p>
                    </div>
                    <button class="btn btn-primary w-full text-white py-2 rounded transition">Submit</button>
                </form>


            </div>
        </div>
    </x-AuthNavigationBar>
</x-Layout>
