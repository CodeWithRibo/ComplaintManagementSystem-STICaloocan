@props([
    'icon' => 'info',
    'label' => 'Enter label',
])
<div
    {{$attributes->merge(['class' => 'flex items-center gap-3  rounded-lg px-4 py-2 shadow w-full sm:w-1/2'])}}>
    @switch($icon)
        @case('pending')
            <i class="ph ph-hourglass-medium text-xl"></i>
            @break
        @case('resolved')
            <i class="fa-solid fa-check text-lg"></i>
            @break
        @case('inProgress')
            <i class="ph ph-spinner-gap  animate-spin text-xl"></i>
            @break
        @case('archive')
            <i class="ph ph-archive text-xl"></i>
            @break
    @endswitch
    <div class="flex flex-col">
        <span class="font-semibold text-sm">{{$label}}</span>
        <span class="text-xs">{{$slot}} </span>
    </div>
</div>
