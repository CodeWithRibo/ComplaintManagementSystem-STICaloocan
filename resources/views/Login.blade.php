<x-layout>
    <x-AuthNavigationBar>
        <div class="flex items-center justify-center min-h-screen py-10 lg:p-0 ">
            <form action="#" method="post">
                <fieldset class="fieldset bg-base-200 border border-base-300 rounded-box w-80 p-6">
                   <div class="flex items-center justify-center text-center flex-col">
                       <img src="{{asset('image/STI_LOGO_for_eLMS.png')}}" class="w-20" alt="">
                       <div class="w-full border-t-2 border-base-300 my-3"></div>
                       <h2 class="text-2xl text-base-content font-semibold">Login</h2>
                       <p class="text-base-content"> Doesn’t have an account yet? <a href="#" class="underline">Signup</a> </p>
                   </div>
                    <x-FormLayout type="text" placeholder="Enter Student ID Number">
                        Student ID Number
                    </x-FormLayout>
                    <x-FormLayout type="password" placeholder="Enter Password">
                        Password
                    </x-FormLayout>
                    <button class="btn btn-neutral mt-6 w-full">Login</button>
                </fieldset>
            </form>
        </div>
    </x-AuthNavigationBar>
</x-layout>
