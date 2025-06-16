@props(['login' => '','logout' => ''])
@php
    use Illuminate\Support\Facades\Auth;
    $auth = Auth::check() ? $logout : $login
 @endphp
<x-layout>
<header class="fixed top-0 left-0 w-full bg-white shadow-md z-50">
    <div class="navbar bg-white shadow-md py-0 w-full" x-data="{ open: false }">
        <div class="flex-1">
            <span class="flex flex-row items-center justify-center lg:justify-start">
                <img src="{{ asset('image/STI_LOGO_for_eLMS.png') }}" class="w-[80px] hidden sm:block" alt="STI LOGO">
                <a href="{{Auth::check() ? route('dashboard.home') : route('welcome') }}" class="text-xl sm:text-2xl text-header hover:text-[#5397E4] transition-all duration-200 text-center pr-5">
                    Complaint Management System
                </a>
                <!-- MOBILE VIEW -->
                <span class="block lg:hidden text-2xl pr-3 cursor-pointer" @click="open = !open">
                    <i class="fa-solid fa-bars"></i>
                </span>
            </span>
        </div>
        <!-- Mobile Dropdown Menu -->
        <div class="w-full bg-white absolute top-16 left-0 shadow-md flex flex-col p-4 space-y-4 lg:hidden z-50" x-show="open" x-transition>
            {{$auth}}
        </div>
        <!-- Desktop Menu -->
        <div class="flex-none ">
            <span class="flex flex-row items-center gap-3.5 pr-5 hidden lg:block z-50">
            {{$auth}}
            </span>
        </div>
    </div>
</header>
<div class="mb-20">
    {{$slot}}
</div>
</x-layout>
