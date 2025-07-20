@props([
    'header' => 'Total Complaints',
    'count' => 0,
    'color' => 'red',
    'indicator' => 'primary',
    'icon' => 'info',
    'buttonText' => 'View Complaints',
])

@php
    $colorVariants = [
        'red' => 'bg-red-50 border-red-200 text-red-800',
        'yellow' => 'bg-yellow-50 border-yellow-200 text-yellow-800',
        'green' => 'bg-green-50 border-green-200 text-green-800',
        'blue' => 'bg-blue-50 border-blue-200 text-blue-800',
        'gray' => 'bg-gray-50 border-gray-200 text-gray-800',
    ];
    $theme = $colorVariants[$color] ?? $colorVariants['red'];
@endphp

<div {{$attributes->merge(['class' => 'card w-full border shadow-md card-md ' . $theme   ])}}>
    <div class="card-body">
        <h2 class="card-title text-{{$color}}-700">
           @switch($icon)
               @case('info')
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-{{ $color }}-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M18.364 5.636a9 9 0 11-12.728 0M12 8v4m0 4h.01" />
                    </svg>
               @break
               @case('clock')
                    <svg class="w-6 h-6 text-{{ $color }}-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 6v6l4 2m4-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
               @break
               @case('check')
                    <svg class="w-6 h-6 text-{{ $color }}-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7" />
                    </svg>
               @break
               @case('path')
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-{{ $color }}-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                    @break
                @case('archived')
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-{{ $color }}-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>

                    @break
           @endswitch
            {{ $header }}
        </h2>
        <p class="text-4xl font-bold text-{{$color}}-800">{{ $count }}</p>
        <div class="card-actions justify-end mt-4">
            <a class="btn text-white btn-{{$indicator}} btn-sm">{{$buttonText}}</a>
        </div>
    </div>
</div>
