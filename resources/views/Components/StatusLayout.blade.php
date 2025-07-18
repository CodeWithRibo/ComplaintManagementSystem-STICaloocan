@props([
    'icon' => 'info',
    'label' => 'Enter label',
])
<span {{$attributes->merge(['class' => 'inline-flex items-center gap-1 text-xs font-semibold px-3 py-1 rounded-full'])}}>
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
    <span class="font-semibold text-sm">{{$label}}</span>
</span>
