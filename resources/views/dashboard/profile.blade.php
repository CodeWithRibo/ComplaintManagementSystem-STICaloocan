@php
    $name  = auth()->user()->last_name . ', ' . auth()->user()->first_name;
    $convert = strtoupper($name);
 @endphp
<x-Layout>
    <x-HomeNavigationBar>
        <x-Section class=" p-0 md:p-10">
            <div class="bg-white rounded-md shadow-md">
            <div class="w-full  mt-10  flex items-center justify-center flex-col p-5">
                <div class="flex items-center flex-col text-center">
                    <div class="avatar">
                          <div class="w-24 rounded-full">
                            <img src="https://img.daisyui.com/images/profile/demo/yellingcat@192.webp" alt="STI PROPERTY"/>
                          </div>
                    </div>
                    <div class="flex items-center text-center my-2">
                        <i class="ph-fill ph-camera"></i>
                        <h1 class="text-button text-base hover:text-blue-600">Change Photo</h1>
                    </div>
                    <div class="mb-2">
                       <h1 class="text-3xl"> {{$convert}}</h1>
                        <h2 class="text-[12.5px] pt-2">STUDENT ID: {{auth()->user()->student_id_number}}</h2>
                    </div>
                </div>
                <div class="w-full border-t-2 border-[#E7C01D] mb-3"></div>
            <div class="w-full  flex items-center justify-center flex-col ">
                <div class="flex flex-col text-center mb-5">
                   <span class=""> BS IN INFORMATION TECHNOLOGY</span>
                    <span class="">STI College Caloocan</span>
                </div>
                <div>
                    <span class="text-[13.5px]">OTHER INFORMATION</span>
                </div>
                <div class="flex items-center text-gray-500 gap-3">
                    <i class="ph ph-envelope"></i>
                    <h1>{{auth()->user()->email}}</h1>
                </div>
                <div class="flex items-center text-gray-500 gap-3">
                    <i class="ph ph-device-mobile"></i>
                    <h1 class="">{{auth()->user()->contact_number}}</h1>
                </div>
            </div>
            </div>
            </div>
            @include('Components.AuthFooter')
        </x-Section>
    </x-HomeNavigationBar>

</x-Layout>
