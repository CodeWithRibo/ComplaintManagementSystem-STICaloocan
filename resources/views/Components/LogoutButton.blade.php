<form action="{{route('logout')}}" method="POST">
    @csrf
    <button type="submit" class="btn bg-button border-none text-white rounded-full px-5 text-base">Logout</button>
</form>
