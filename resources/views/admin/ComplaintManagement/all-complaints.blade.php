<x-Layout>
    <x-admin.navigation-bar>
        <x-Section>
            <div class=" mt-20">
                <x-Search header="All Complaints"></x-Search>{{--SEARCH BAR, UNDER DEVELOPMENT--}}
                <div x-data="{modalIsOpen: false, selectedComplaint: null}">
                    @include('Components.admin.complaint-table',
                    ['complaints' => $allUserComplaints,
                     'resolutionNote' => null
                      ])
                    <x-view-details-modal/>
                </div>
            </div>
            @include('Components.AuthFooter')
        </x-Section>
    </x-admin.navigation-bar>
</x-Layout>
