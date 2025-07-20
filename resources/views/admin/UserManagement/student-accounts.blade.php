<x-Layout>
    <x-admin.navigation-bar>
        <x-Section>
            @include('Components.admin.user-management-accounts', [
                'header' => 'Student Accounts',
                'users' => $users,
                'noUserFound' => 'No User Found'
                ])
        </x-Section>
    </x-admin.navigation-bar>
</x-Layout>
