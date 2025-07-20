@props(['action' => '', 'route' => ''])
<li class="list-none">
    @switch($action)
        @case('update')
            <form action="{{$route}}" method="POST">
                @csrf
                @method('PUT')
                <input
                    type="submit" {{$attributes->merge(['class' => ' cursor-pointer text-sm px-2 py-1 text-base-content font-bold'])}}>
            </form>
            @break
    @endswitch
</li>
