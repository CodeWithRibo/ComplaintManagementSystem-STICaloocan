<x-Layout>
    <x-AuthNavigationBar>
        <form action="#" method="POST">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="password" placeholder="Password">
            <input type="text" name="token" value="{{$token}}" hidden >
        </form>
    </x-AuthNavigationBar>
</x-Layout>
