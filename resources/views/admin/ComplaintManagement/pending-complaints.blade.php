<x-Layout>
    <x-admin.navigation-bar>
        <x-Section>
            <div class=" mt-20">
                <x-Search header="All Complaints"></x-Search>{{--SEARCH BAR, UNDER DEVELOPMENT--}}
                <div x-data="{modalIsOpen: false, selectedComplaint: null}">
                    @include('Components.admin.complaint-table',
                    ['complaints' => $pending,
                     'resolutionNote' => null,
                       'noComplaintFound' => 'No complaints are currently pending'
                      ])
                    <x-view-details-modal/>
                </div>
            </div>
            @include('Components.AuthFooter')
        </x-Section>
    </x-admin.navigation-bar>
</x-Layout>
