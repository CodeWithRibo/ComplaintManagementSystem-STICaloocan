@props(['name' => '', 'label' => '', 'inputField' => 'input'])

<label class="block text-sm font-medium text-gray-700 mb-1">{{$label}}</label>

@if($inputField === 'textarea')
    <textarea {{$attributes}} rows="4"
              name="{{ $name }}"
              class="w-full border border-gray-300 rounded px-4 py-2 resize-none focus:outline-none focus:ring focus:focus:ring-blue-400">{{$slot}}</textarea>
@elseif($inputField === 'file')
    <input type="file" {{$attributes}}
           class="w-full border border-gray-300 rounded px-4 py-2 file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:bg-neutral file:text-white hover:file:bg-accent-dark">
@else
    <input name="{{ $name }}"
           {{$attributes}} class="@error($name) is-invalid @enderror w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-blue-400">
@endif
@error($name)
<div role="alert" class=" mt-2 alert alert-error alert-soft"> {{ $message }}</div>
@enderror
