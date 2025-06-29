@props(['label' => ''])
<div>
    <label class="block text-xs font-medium text-gray-500 dark:text-gray-400">{{$label}}</label>
    <p class="text-sm font-semibold text-gray-800 dark:text-white">{{$slot}}</p>
</div>
