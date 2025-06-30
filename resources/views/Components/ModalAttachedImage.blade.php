@props(['label' => ''])

<div>
    <label class="block text-sm font-semibold text-gray-700 dark:text-white mb-1">
        {{ $label }}
    </label>

    <div class="mt-2 h-40 rounded bg-gray-100 dark:bg-gray-700 dark:text-gray-300 flex items-center justify-center overflow-hidden {{$attributes->get('class')}}">
        <p class="text-sm text-gray-700 dark:text-gray-300" {{ $attributes }}></p>
        {{$slot}}
    </div>
</div>
