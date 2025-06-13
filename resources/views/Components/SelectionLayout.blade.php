@props(['name', 'disabledOption' => 'Enter Text', 'label' => 'Enter label'])
<div class="mb-2">
    <label class="label">
        <span class="label-text">{{ $label }}</span>
    </label>
    <select {{ $attributes }} name="{{$name}}" class="@error($name) is-invalid @enderror select select-bordered w-full" required>
        <option disabled selected> {{$disabledOption}}</option>
       {{$slot}}
    </select>
    @error($name)
    <div role="alert" class=" mt-2 alert alert-error alert-soft"> {{ $message }}</div>
    @enderror
</div>
