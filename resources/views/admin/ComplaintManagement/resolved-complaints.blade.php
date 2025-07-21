<x-Layout>
    <x-admin.navigation-bar>
        <x-Section>
            <div class="flex flex-col bg-white shadow-md rounded-md px-5 py-5 mt-20 mx-10"
                 x-data="{modalIsOpen: false, selectedComplaint: null}">
                <x-Search></x-Search>{{--SEARCH BAR, UNDER DEVELOPMENT--}}
                <h1 class="text-base-content text-2xl p-2 my-5 text-center xl:text-start border-l-4 border-primary bg-base-100 shadow-sm rounded-r-lg w-auto xl:w-96">
                    Resolved Complaints</h1>
                @include('Components.admin.complaint-table',
                               ['complaints' => $resolved,
                                'resolutionNote' => null,
                     'noComplaintFound' => 'No complaints have been resolved yet'
                                 ])
                {{--Modal View Details--}}
                <x-view-details-modal/>
            </div>
            @include('Components.AuthFooter')
        </x-Section>
    </x-admin.navigation-bar>
</x-Layout>


