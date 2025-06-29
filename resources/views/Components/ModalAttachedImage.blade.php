@props(['label' => ''])
<div class="md:col-span-2">
    <label class="block text-xs font-medium text-gray-500 dark:text-gray-400">{{$label}}</label>
    <div
        class="mt-2 h-40 rounded bg-gray-100 flex items-center justify-center text-gray-400 text-xs dark:bg-gray-700 dark:text-gray-300">
        {{$slot}}
    </div>
</div>
