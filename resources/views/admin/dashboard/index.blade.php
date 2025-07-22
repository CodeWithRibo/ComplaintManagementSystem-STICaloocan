@php
    use App\Models\user\Complaint;

   $counts = [
       'totalCount' => Complaint::pluck('status')->count(),
       'pending' => Complaint::where('status','Pending')->count(),
       'resolved' => Complaint::where('status','Resolved')->count(),
       'inProgress' => Complaint::where('status','In Progress')->count(),
       'archived' => Complaint::where('status','Archived')->count(),
       'facilities' => Complaint::where('category','Facilities')->count(),
       'faculty' => Complaint::where('category','Faculty')->count(),
       'admission' => Complaint::where('category','Admission')->count(),
       'cashier' => Complaint::where('category','Cashier')->count(),
       'registrar' => Complaint::where('category','Registrar')->count(),
];


        $collectCategory = collect($counts);
        $getCategory = $collectCategory->except(['totalCount','pending','resolved', 'inProgress', 'archived']);

@endphp
<x-Layout>
    <x-admin.navigation-bar>
        <x-Section>
            <div class="flex flex-col bg-white relative shadow-md rounded-md px-5 py-5 mt-10 mx-10">
                <h1 class="text-base-content text-2xl p-2 my-5 text-center xl:text-start border-l-4 border-primary bg-base-100 shadow-sm rounded-r-lg w-auto xl:w-96">Complaint Summary</h1>
                <div class="grid grid-cols-1 xl:grid-cols-2 grid-rows-1">
                    <div class="grid grid-cols-1 xl:grid-cols-2 grid-rows-2 gap-4">
                        <x-admin.complaint-summary-cards
                            header="Total {{$counts['totalCount'] >= 2 ? 'Complaints' : 'Complaint'}}"
                            count="{{$counts['totalCount']}}"
                        />
                        <x-admin.complaint-summary-cards
                            header="Pending {{$counts['pending'] >= 2 ? 'Complaints' : 'Complaint'}}"
                            count="{{$counts['pending']}}"
                            icon="clock"
                            color="yellow"
                        />
                        <x-admin.complaint-summary-cards
                            header="In Progress {{$counts['inProgress'] >= 2 ? 'Complaints' : 'Complaint'}}"
                            count="{{$counts['inProgress']}}"
                            icon="path"
                            color="blue"
                        />

                        <x-admin.complaint-summary-cards
                            header="Resolved {{$counts['resolved'] >= 2 ? 'Complaints' : 'Complaint'}} "
                            count="{{$counts['resolved']}}"
                            icon="check"
                            color="green"
                        />
                        <x-admin.complaint-summary-cards
                            header="Archived {{$counts['archived'] >= 2 ? 'Complaints' : 'Complaint'}}"
                            count="{{$counts['archived']}}"
                            icon="archived"
                            color="gray"
                        />
                    </div>
                    <div class="p-0 xl:pl-32 relative ">
                        <h1 class="xl:absolute xl:-top-[62px] text-base-content text-2xl p-2 my-10 xl:mt-0 text-center xl:text-start border-l-4 border-primary bg-base-100 shadow-sm rounded-r-lg  w-auto xl:w-96 ">Complaints by Category</h1>
                        <div class="" style="height: 600px;">
                            <canvas id="myChart" class=""></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col bg-white shadow-md rounded-md px-5 py-5 mt-20 mx-10"
                 x-data="{modalIsOpen: false, selectedComplaint: null}">
                @include('Components.admin.complaint-table',
                            ['complaints' => $userComplaints,
                             'resolutionNote' => null,
                             'noComplaintFound' => 'No Complaint Found',
                             'header' => 'Recent Complaints'
                              ])
                {{--Modal View Details--}}
                <x-view-details-modal/>
            </div>

        </x-Section>
        <script>
            const ctx = document.getElementById('myChart');
            const rawData = {!! @json_encode($getCategory) !!};
            console.log(rawData);
            const dataCategory = [
                rawData.facilities,
                rawData.faculty,
                rawData.admission,
                rawData.cashier,
                rawData.registrar,
            ]

            const data = {
                labels: [
                    'Facilities',
                    'Faculty',
                    'Admission',
                    'Cashier',
                    'Registrar',
                ],
                datasets: [{
                    label: [rawData.low, rawData.medium, rawData.high],
                    data: dataCategory,
                    backgroundColor: [
                        '#9CA3AF',
                        '#93C5FD',
                        '#A5B4FC',
                        '#FCD34D',
                        '#CBD5E1',
                    ],
                    hoverOffset: 4
                }]
            };

            new Chart(ctx, {
                type: 'pie',
                data: data,
                options: {
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        @include('Components.AuthFooter')
    </x-admin.navigation-bar>
</x-Layout>

