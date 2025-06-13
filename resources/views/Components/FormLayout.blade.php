@props(['name', 'placeholder' => 'Enter text'])
<div class="mb-2">
    <label class="label">
        <span class="label-text">{{ $slot }}</span>
    </label>
    <input {{$attributes}} name="{{ $name }}" class="@error($name) is-invalid @enderror input input-bordered w-full " placeholder="{{$placeholder}}" />
    @error($name)
    <div role="alert" class=" mt-2 alert alert-error alert-soft"> {{ $message }}</div>
    @enderror
</div>


