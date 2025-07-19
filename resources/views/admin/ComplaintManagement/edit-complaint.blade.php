@php use Illuminate\Support\Carbon; @endphp
<x-Layout>
    <x-admin.navigation-bar>
      <x-Section>
          <div class="flex items-center justify-center min-h-screen py-20 lg:p-20 ">
              <form action="{{route('admin.edit-complaint', $complaint->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <fieldset class="fieldset  bg-base-200 border border-base-300 rounded-box px-5 py-10">
                      @if(session('warning'))
                          <div role="alert" class="mt-2 alert alert-error alert-soft fixed z-50 "> {{ session('warning')}}</div>
                      @endif
                      <div class="flex items-center justify-center text-center flex-col">
                          <img src="{{asset('image/STI_LOGO_for_eLMS.png')}}" class="w-20" alt="">
                          <div class="w-full border-t-2 border-base-300 my-3"></div>
                          <h2 class="text-2xl text-base-content font-semibold">Edit Complaint</h2>
                      </div>
                      <div class="p-6">
                          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                              <div x-data=" {open: false } ">
                                  {{--Category--}}
                                  <x-SelectionLayout type="select" name="category" label="Category"
                                                     disabledOption="Select Category">
                                      <option value="Facilities"  @click="open = true" {{ $complaint->category == 'Facilities' ? 'selected' : '' }}>Facilities</option>
                                      <option value="Faculty" @click="open = false" {{ $complaint->category == 'Faculty' ? 'selected' : '' }}>Faculty</option>
                                      <option value="Admission" @click="open = false" {{ $complaint->category == 'Admission' ? 'selected' : '' }}>Admission</option>
                                      <option value="Cashier"  @click="open = false"{{ $complaint->category == 'Cashier' ? 'selected' : '' }}>Cashier</option>
                                      <option value="Registrar" @click="open = false"{{ $complaint->category == 'Registrar' ? 'selected' : '' }}>Registrar</option>
                                  </x-SelectionLayout>
                                  {{--Additional Quesiton, Location Details--}}
                                  <span x-show="open">
                                    <x-EditFormLayout label="Location" name="location" placeholder="e.g., Computer Laboratory 101" value="{{old('location', $complaint->location) }}"/>
                                    </span>
                                  {{--Complaint Tracker--}}
                                  <input type="hidden" name="complaint_tracker">
                                  {{--Title--}}
                                  <x-FormLayout type="text" value="{{old('title', $complaint->title)}}" name="title"
                                                placeholder="e.g., Broken Chair in Room 405"
                                                label="Title of the Complaint">
                                  </x-FormLayout>
                                  {{--Desciption--}}
                                  <x-EditFormLayout name="description" label="Description" inputField="textarea">
                                      {{ old('description', $complaint->description) }}
                                  </x-EditFormLayout>
                                  {{--Incident Time--}}
                                  <x-EditFormLayout type="datetime-local" name="incident_time" label="Incident Time" value="{{ old('incident_time', Carbon::parse($complaint->incident_time)->format('Y-m-d\TH:i')) }}"/>
                                  {{--Complaint Tracker--}}
                                  <x-FormLayout type="text" value="{{old('complaint_tracker', $complaint->complaint_tracker)}}" name="complaint_tracker"
                                                placeholder="e.g., CPL-18-2003"
                                                label="Complaint Tracker">
                                  </x-FormLayout>
                              </div>
                              <div x-data="{open: false}">
                                  {{--Priority--}}
                                  <x-SelectionLayout type="select" name="priority" label="Priority Level"
                                                     disabledOption="Select priority level" value="{{old('priority', $complaint->priority)}}">
                                      <option value="Low"  {{ $complaint->priority == 'Low' ? 'selected' : '' }}>Low - Minor issue, not
                                          urgent</option>
                                      <option value="Medium"  {{ $complaint->priority == 'Medium' ? 'selected' : '' }}>Medium - Need
                                          attention, moderate urgency</option>
                                      <option value="High" {{ $complaint->priority == 'High' ? 'selected' : '' }}>High - Serious or
                                          urgent matter</option>
                                  </x-SelectionLayout>
                                    {{--Status--}}
                                  <x-SelectionLayout type="select" name="status" label="Status"
                                                     disabledOption="Select status">
                                      <option value="Pending"  {{ $complaint->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                      <option value="In Progress"  {{ $complaint->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                      <option value="Resolved" {{ $complaint->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                                      <option value="Archived" {{ $complaint->status == 'Archived' ? 'selected' : '' }}>Archived</option>
                                  </x-SelectionLayout>
                                  {{--Upload Image--}}
                                  <x-FormLayout type="file" value="{{old('image_path')}}" name="image_path"
                                                accept=".jpg,.jpeg,.png"
                                                label="Attach Image or Screenshot (Optional)">

                                  </x-FormLayout>
                                  {{--Contact Information Identified or Anonymous--}}
                                  <x-SelectionLayout type="select" name="type_submit" label="Submission Type"
                                                     disabledOption="Select type">
                                      <option value="Identified"
                                              @click="open = true" {{$complaint->type_submit === 'Identified' ? 'selected' : ''}} >I
                                          will provide my contact
                                          information
                                      </option>
                                      <option value="Anonymous"
                                              @click="open = false" {{$complaint->type_submit === 'Anonymous' ? 'selected' : ''}}>Do
                                          not display my name or
                                          student id
                                      </option>
                                  </x-SelectionLayout>
                                  {{--Identified Contact Information--}}
                                  <span x-show="open">
                                    <x-FormLayout type="text" name="full_name"
                                                  placeholder="e.g., Juan Dela Cruz"
                                                  label="Full Name"
                                                  value="{{$complaint->full_name}} ">
                                    </x-FormLayout>
                                    <x-FormLayout type="text" name="student_id_number"
                                                  placeholder="e.g., 02000411432"
                                                  label="Student ID"
                                                  value="{{$complaint->student_id_number}}">
                                    </x-FormLayout>
                                    <x-FormLayout type="email" name="email"
                                                  placeholder="e.g., juandelacruz@gmail.com"
                                                  label="Email Address"
                                                  value="{{$complaint->email}}">
                                    </x-FormLayout>
                                        @if(!empty($complaint->contact_number))
                                          <x-FormLayout type="text" name="phone_number"
                                                        placeholder="e.g., 09123456789"
                                                        label="Mobile Number (Optional)"
                                                        value="{{$complaint->contact_number}}">
                                                </x-FormLayout>
                                      @else
                                          <x-FormLayout type="text" name="phone_number"
                                                        placeholder="e.g., 09123456789"
                                                        label="Mobile Number (Optional)">
                                                </x-FormLayout>
                                      @endif

                                    <x-FormLayout type="text" name="year_section"
                                                  placeholder="e.g., 1st year - BT-207"
                                                  label="Year & Section"
                                                  value="{{$complaint->user->grade_level . ' ' . $complaint->user->program . ' ' .  $complaint->user->section}}"
                                    >
                                    </x-FormLayout>
                                    </span>
                              </div>
                          </div>
                          <button type="submit" class="btn btn-secondary text-white mt-6 w-full">Submit</button>
                      </div>
                  </fieldset>
              </form>
          </div>
      </x-Section>
    </x-admin.navigation-bar>
</x-Layout>
