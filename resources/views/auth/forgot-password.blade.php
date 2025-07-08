<x-Layout>
    <x-AuthNavigationBar>
        <form action="{{route('forgot-password')}}" method="POST" class="p-32">
            @csrf
            <input type="email" name="email" placeholder="Email" class="input input-accent">
            <button type="submit" class="btn btn-submit">Submit</button>
        </form>
    </x-AuthNavigationBar>
</x-Layout>
