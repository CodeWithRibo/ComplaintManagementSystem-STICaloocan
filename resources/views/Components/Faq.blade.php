@props(['title' => '', 'content' => ''])
<div class="collapse collapse-plus bg-base-100 border border-base-300">
    <input type="radio" name="my-accordion-3" checked="checked" />
    <div class="collapse-title font-semibold">{{$title}}</div>
    <div class="collapse-content text-sm">{{$content}}</div>
</div>
