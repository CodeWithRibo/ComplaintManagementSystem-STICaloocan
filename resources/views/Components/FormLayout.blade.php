{{--@props(['type' => null, 'placeholder' => null, 'layout' => true])--}}

{{--@if($layout)--}}
{{--    <div class="mb-4">--}}
{{--        <label class="label">--}}
{{--            <span class="label-text">{{ $slot }}</span>--}}
{{--        </label>--}}
{{--        {{ $slot }}--}}
{{--    </div>--}}
{{--@else--}}
{{--    {{ $slot }}--}}
{{--@endif--}}

<div class="mb-2">
    <label class="label">
        <span class="label-text">{{ $slot }}</span>
    </label>
    <input type="{{$type}}" class="input input-bordered w-full" placeholder="{{$placeholder}}" />
</div>

