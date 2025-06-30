@php
    $name  = auth()->user()->first_name . ' ' . auth()->user()->last_name;
    $convert = strtoupper($name);

$mDropdownMenu = [
'My Complaints' => [
  ['icon' => 'fa-house', 'label' => 'All Complaints', 'route' => route('dashboard.listComplaint')],
  ['icon' => 'fa-folder', 'label' => 'Pending Complaints'],
  ['icon' => 'fa-clock', 'label' => 'Resolved Complaints'],
],
'Complaint Details' => [
  ['icon' => 'fa-circle-check', 'label' => 'View / Edit Complaints'],
],
'Others' => [
  ['icon' => 'fa-question', 'label' => 'FAQ'],
  ['icon' => 'fa-address-book', 'label' => 'Contact Us'],
  ['icon' => 'fa-arrow-right-from-bracket', 'label' => 'Logout'],
],
];

$asideMenu = [
'My Complaints' => [
  ['icon' => 'fa-house', 'label' => 'All Complaints', 'route' => route('dashboard.listComplaint')],
  ['icon' => 'fa-folder', 'label' => 'Pending Complaints'],
  ['icon' => 'fa-clock', 'label' => 'Resolved Complaints'],
],
'Complaint Details' => [
  ['icon' => 'fa-circle-check', 'label' => 'View / Edit Complaints'],
],
'Others' => [
  ['icon' => 'fa-question', 'label' => 'FAQ'],
  ['icon' => 'fa-address-book', 'label' => 'Contact Us'],
],
];
@endphp
<div x-data="{ open: false }">
    <div class="navbar fixed z-10 bg-button shadow-sm h-16">
        <div class=" px-5 sm:px-7 order-3 md:order-none">
       <span class="text-white" @click="open = ! open">
           <i class="fa-solid fa-bars"></i>
       </span>
        </div>
        <div class="flex-1 ">
            <a href="{{route('dashboard.home', ['page' => 'home']) }}" class="text-xl text-white">Complaint Management System</a>
        </div>
        <div class="dropdown flex-none hidden md:block">
            <div tabindex="0" role="button" class="w-10">
                <img src="{{ asset('image/default_avatar.png') }}" class="w-10" alt="Profile">
            </div>
            <ul class="dropdown-content menu bg-base-100 rounded-box shadow-sm w-52 mt-2 right-0 z-50">
                <li>
                    <a href="#">Profile</a>
                </li>
                <li>
                    <a href="{{route('logout')}}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
    {{--Aside Desktop Icon--}}
    <div x-show="! open"
         x-transition
         class="h-screen fixed top-0 z-0 w-20 bg-white shadow-lg hidden md:flex flex-col items-center pt-10">
        <ul class="w-full flex flex-col items-center gap-5 px-2 pt-10">
            @foreach($asideMenu as $header => $items)
                @foreach($items as $item)
                    <li class="flex items-center justify-center h-10 text-gray-500 hover:text-button">
                        @if(isset($item['route']))
                            <a href="{{ $item['route'] }}"
                                @class(['text-button font-semibold' => request()->url() === $item['route'],
                                         'text-gray-500' => request()->url() != $item['route']])>
                                <i class="fa-solid {{ $item['icon'] }} text-xl"></i>
                            </a>
                        @else
                            <i class="fa-solid {{ $item['icon'] }} text-xl"></i>
                        @endif
                    </li>
                @endforeach
            @endforeach
        </ul>
    </div>
    {{--Aside Desktop Menu--}}
    <div x-show="open"
         x-transition
         class="bg-white shadow-lg w-[300px] h-screen hidden md:block overflow-y-auto fixed">
        <div class="text-button flex flex-col">
            <ul class="flex flex-col p-3 pt-20  space-y-3">
                @foreach($asideMenu as $header => $items)
                    <h1 class="text-base-content font-semibold">{{$header}}</h1>
                    @foreach($items as $item)
                        <li class="flex items-center h-10 gap-3 text-gray-500 ">
                            <div class="w-10 h-10 flex items-center justify-center">
                                <i class="fa-solid {{$item['icon']}} "></i>
                            </div>
                            @if(isset($item['route']))
                                <a href="{{ $item['route'] }}"
                                   @class(['text-button font-semibold' => request()->url() === $item['route'],
                                            'text-gray-500' => request()->url() != $item['route']])>
                                    {{ $item['label'] }}
                                </a>
                            @else
                                <span
                                    class="text-gray-500 hover:text-button leading-none flex items-center h-10">{{$item['label']}}</span>
                            @endif
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>
    {{--Mobile view dropdown--}}
    <div x-show="open"
         x-transition.scale.origin.top
         x-transition.delay.50ms
         class="bg-white shadow-lg w-full md:hidden sticky top-0 z-3">
        <div class="text-button flex flex-col">
            <ul class="flex flex-col p-3 pt-20  space-y-3">
                <li class="flex items-center h-10 gap-3 text- hover:text-button">
                    <div class="w-10 h-10">
                        <img src="{{ asset('image/default_avatar.png') }}" class=" object-cover rounded-full"
                             alt="Profile">
                    </div>
                    <span
                        class=" text-gray-500 hover:text-button leading-none flex items-center h-10">{{$convert}}</span>
                </li>
                @foreach($mDropdownMenu as $header => $items)
                    <h1 class="text-base-content font-semibold">{{$header}}</h1>
                    @foreach($items as $item)
                        <li class="flex items-center h-10 gap-3 text-gray-500 hover:text-button">
                            <div class="w-10 h-10 flex items-center justify-center">
                                <i class="fa-solid {{$item['icon']}} "></i>
                            </div>
                            <span
                                class="text-gray-500 hover:text-button leading-none flex items-center h-10">{{$item['label']}}</span>
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>
    {{$slot}}
</div>
