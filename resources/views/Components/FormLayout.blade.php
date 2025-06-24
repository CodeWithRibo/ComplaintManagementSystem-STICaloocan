@props([
    'name',
    'placeholder' => '',
    'inputField' => 'input',
    'label' => 'Enter Label',
])
<div class="mb-2">
    <label class="label">
        <span class="label-text">{{ $label }}</span>
    </label>
    @if($inputField === 'textarea')
        <textarea {{$attributes}} name="{{ $name }}"
                  class="@error($name) is-invalid @enderror textarea textarea-bordered w-full resize-none "
                  placeholder="{{$placeholder}}">{{old($name)}}</textarea>
    @else
        <input
            name="{{ $name }}"
            {{ $attributes->merge([
                'class' => 'input input-bordered w-full ' . ($errors->has($name) ? 'is-invalid' : '')
            ]) }}
            placeholder="{{ $placeholder }}"
        />
    @endif
    @error($name)
    <div role="alert" class=" mt-2 alert alert-error alert-soft"> {{ $message }}</div>
    @enderror
</div>


