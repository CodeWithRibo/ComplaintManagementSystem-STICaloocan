<x-layout>
    <x-NavigationBar>
        <x-slot name="logout">
            <x-LogoutButton/>
        </x-slot>
        <x-slot name="login">
            <x-LoginButton />
        </x-slot>
    </x-NavigationBar>
    <span class="text-xl text-red-500 font-semibold">Hi there, {{Auth::check() ? Auth::user()->first_name : 'Guest'}}</span>
</x-layout>
