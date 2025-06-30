@props(['label' => ''] )
<div>
{{--    Filter by Status--}}
    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">{{$label}}</label>
    <select id="status" class="select select-bordered w-40 text-sm" {{$attributes}}>
        {{$slot}}
    </select>
</div>
