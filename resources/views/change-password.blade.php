<x-Layout>
    <form action="{{route('changePassword', $user->id)}}" method="POST">
        @csrf
        <x-FormLayout type="password" name="current_password" placeholder="Enter current password" label="Current Password"/>
        <x-FormLayout type="password" name="password" placeholder="Enter new password" label="New Password"/>
        <x-FormLayout type="password" name="password_confirmation" placeholder="Enter current password" label="Confirm Password"/>
        <button type="submit" class="btn btn-ghost">Submit</button>
    </form>
</x-Layout>
