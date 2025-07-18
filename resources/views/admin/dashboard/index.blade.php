@php
    use Illuminate\Support\Carbon;
    use App\Models\user\Complaint;

   $counts = [
       'totalCount' => Complaint::pluck('status')->count(),
       'pending' => Complaint::where('status','Pending')->count(),
       'resolved' => Complaint::where('status','Resolved')->count(),
]
 @endphp
<x-Layout>
   <x-admin.navigation-bar>
       <x-Section>
          <div class="flex flex-col mx-auto max-w-7xl">
              <h1 class="text-base-content text-2xl p-5 text-center lg:text-start ">Complaint Summary</h1>
              <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 lg:grid-rows-2  grid-rows-3 p-5 mx-auto max-w-7xl gap-5  ">
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
                      header="In Progress"
                      count="0"
                      icon="path"
                      color="blue"
                  />
                  <x-admin.complaint-summary-cards
                      header="Resolved"
                      count="{{$counts['resolved']}}"
                      icon="check"
                      color="green"
                  />
              </div>
          </div>
           <div class="flex flex-col mt-20 mx-auto  max-w-7xl" x-data="{modalIsOpen: false, selectedComplaint: null}" >
               <h1 class="text-base-content text-2xl p-5 text-center lg:text-start">Recent Complaint</h1>
                @include('Components.admin.complaint-table', [
                'complaints' => $userComplaints,
                'resolutionNote' => null
])
               {{--Modal View Details--}}
               <x-view-details-modal/>
           </div>
       </x-Section>
       @include('Components.AuthFooter')
   </x-admin.navigation-bar>
</x-Layout>

