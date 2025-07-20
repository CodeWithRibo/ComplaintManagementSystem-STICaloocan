@props([
    'label' => 'Enter Label',
    'name',
    'disabledOption' => 'Enter text'
])
<div class="sm:col-span-4">
    <label for="region" class="block text-sm/6 font-medium text-gray-900">{{$label}}</label>
    <div class="mt-2">
        <select name="{{$name}}" class="@error($name) is-invalid @enderror border-1 py-3 px-2 border-gray-400 cursor-pointer ">
            <option disabled selected> {{$disabledOption}}</option>
            {{$slot}}
        </select>
    </div>
    @error($name)
    <div role="alert" class="mt-2 alert alert-error alert-soft"> {{ $message }}</div>
    @enderror
</div>
