@props(['header' => '', 'content' => ''])
<div>
    <h2 class="text-lg font-semibold text-gray-900">{{$header}}</h2>
    <p>{{$content}}</p>
    {{$slot}}
</div>
