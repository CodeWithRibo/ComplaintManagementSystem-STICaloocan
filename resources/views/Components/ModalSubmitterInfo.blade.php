@props(['label' => ''])
<div>
    <label
        class="block text-xs font-medium text-gray-500 dark:text-gray-400">{{$label}}</label>
    <p class="text-sm text-gray-700 dark:text-gray-300">{{$slot}}</p>
</div>
