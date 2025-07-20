<x-Layout>
    <x-AuthNavigationBar>
        <div class="flex items-center justify-center min-h-screen py-10 lg:p-0" x-data="{passwordShow : false}">
            <form action="{{$action}}" method="POST">
                @csrf
                <fieldset class="fieldset bg-base-200 border border-base-300 rounded-box w-80 p-6 relative">
                    <div class="flex items-center justify-center text-center flex-col">
                        <img src="{{asset('image/STI_LOGO_for_eLMS.png')}}" class="w-20" alt="">
                        <div class="w-full border-t-2 border-base-300 my-3"></div>
                        <h2 class="text-2xl text-base-content font-semibold">{{$header}}</h2>
                        <p class="text-base-content"> Doesn’t have an account yet? <a href="{{$link}}"
                                                                                      class="underline">Signup</a></p>
                    </div>
                    <x-FormLayout type="text" name="{{$name}}"
                                  placeholder="{{$placeholder}}" label="{{$label}}"/>
                    <x-FormLayout type="password" name="password" placeholder="Enter Password" label="Password"
                                  x-bind:type="passwordShow ? 'text' : 'password'" class="relative z-0"/>
                    <div class="flex items-center gap-2">
                        <a href="{{route('show.link-request-form')}}" class="text-gray-700 pr-2 underline ">Forgot Password</a>
                        <input type="checkbox" class="cursor-pointer" @click="passwordShow = !passwordShow" >
                        <p class="text-gray-500">Show Password</p>
                    </div>
                    <button class="btn btn-neutral mt-6 w-full">Login</button>
                </fieldset>
            </form>
        </div>
    </x-AuthNavigationBar>
</x-Layout>
