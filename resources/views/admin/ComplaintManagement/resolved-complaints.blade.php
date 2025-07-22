<x-Layout>
    <x-admin.navigation-bar>
        <x-Section>
            <div class="flex flex-col bg-white shadow-md rounded-md px-5 py-5 mt-20 mx-10"
                 x-data="{modalIsOpen: false, selectedComplaint: null}">
                @include('Components.admin.complaint-table',
                               ['complaints' => $resolved,
                                'resolutionNote' => null,
                     'noComplaintFound' => 'No complaints have been resolved yet',
                     'header' => 'Resolved Complaints'
                                 ])
                {{--Modal View Details--}}
                <x-view-details-modal/>
            </div>
            @include('Components.AuthFooter')
        </x-Section>
    </x-admin.navigation-bar>
</x-Layout>


