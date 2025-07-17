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
              <h1 class="text-base-content text-2xl p-5 md:text-center lg:text-start ">Complaint Summary</h1>
              <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 lg:grid-rows-2  grid-rows-3 p-5 mx-auto max-w-7xl gap-5  ">
                  <x-admin.complaint-summary-cards
                      header="Total {{$counts['totalCount'] >= 2 ? 'Complaints' : 'Complaint'}}"
                      count="{{$counts['totalCount']}}"
                      indicator="error"
                  />
                  <x-admin.complaint-summary-cards
                      header="Pending {{$counts['pending'] >= 2 ? 'Complaints' : 'Complaint'}}"
                      count="{{$counts['pending']}}"
                      icon="clock"
                      color="yellow"
                      indicator="warning"

                  />
                  <x-admin.complaint-summary-cards
                      header="In Progress"
                      count="0"
                      icon="path"
                      color="blue"
                      indicator="primary"
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
               <h1 class="text-base-content text-2xl p-5 md:text-center lg:text-start">Recent Complaint</h1>
               <div class="overflow-x-auto  rounded-lg shadow-md">
                   <table class="table w-full text-sm text-left text-gray-700">
                       <thead class="bg-gray-100 text-gray-700 uppercase">
                       <tr>
                           <th class="px-6 py-4">Author</th>
                           <th class="px-6 py-4">Title</th>
                           <th class="px-6 py-4">Status</th>
                           <th class="px-6 py-4">Submitted</th>
                           <th class="px-6 py-4">Complaint Tracker</th>
                           <th class="px-6 py-4">Details</th>
                       </tr>
                       </thead>
                       @forelse($userComplaints as $complaint)
                       <tbody>
                          <tr>
                              <td class="px-6 py-4">{{$complaint->is_anonymous ?  'Anonymous' :$complaint->full_name }}</td>
                              <td class="px-6 py-4">{{$complaint->title}}</td>
                              <td class="px-6 py-4 text-secondary-yellow">{{$complaint->status}}</td>
                              <td class="px-6 py-4">{{Carbon::parse($complaint->created_at)->format('F jS, Y g:i A')}}</td>
                              <td class="px-6 py-4">{{$complaint->complaint_tracker}}</td>
                              <td class="px-6 py-4">
                                  <button class="btn btn-neutral"
                                          @click="modalIsOpen = true; selectedComplaint = {{json_encode($complaint)}}"
                                          type="submit">View Details</button>
                              </td>
                              @empty
                                  <td  colspan="6" class="text-2xl text-gray-500 text-center italic"> No complaints have been submitted yet. </td>
                          </tr>
                       </tbody>
                       @endforelse
                   </table>
               </div>
               {{--Modal View Details--}}
               <x-view-details-modal/>
           </div>
       </x-Section>
   </x-admin.navigation-bar>
</x-Layout>

