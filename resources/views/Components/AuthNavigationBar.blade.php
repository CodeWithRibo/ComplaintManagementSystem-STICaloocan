<x-layout>
    <header class="fixed top-0 left-0 w-full bg-white shadow-md z-50">
        <div class="navbar bg-[#0B5793] shadow-md py-0 w-full" x-data="{ open: false }">
            <div class="flex-1">
            <span class="flex flex-row items-center justify-center lg:justify-start">
                <a href="{{Auth::check() ? route('dashboard.home') : route('welcome') }}" class="text-xl sm:text-2xl text-white font-semibold transition-all duration-200 text-center pr-5">
                    Complaint Management System
                </a>
            </span>
            </div>
        </div>
    </header>
    <div>
        {{$slot}}
    </div>
</x-layout>
