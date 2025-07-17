<x-Layout>
    <x-admin.navigation-bar>
        <x-Section>
            <div class="mx-auto max-w-7xl mt-20">
                <x-Search header="All Complaints">

                </x-Search>
                <div  x-data="{modalIsOpen: false, selectedComplaint: null}">
                    @include('Components.admin.complaint-table', ['complaints' => $allUserComplaints])
                    <x-view-details-modal/>
                </div>
            </div>
            @include('Components.AuthFooter')
        </x-Section>
    </x-admin.navigation-bar>
</x-Layout>
