@props([
    'label' => 'Enter Label',
    'name'
])
<div class="sm:col-span-3">
    <label class="block text-sm/6 font-medium text-gray-900">{{$label}}</label>
    <div class="mt-2">
        <input {{$attributes}} name="{{$name}}"
               class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-300 sm:text-sm/6"/>
    </div>
    @error($name)
    <div role="alert" class="mt-2 alert alert-error alert-soft"> {{ $message }}</div>
    @enderror
</div>
