@php use Illuminate\Support\Carbon; @endphp
<x-Layout>
    <x-HomeNavigationBar>
        <x-Section class="md:pt-32">
            <div class="max-w-5xl mx-auto px-4 py-6 bg-white shadow-md rounded-lg">
                <div class="flex items-center justify-center text-center flex-col">
                    <img src="{{asset('image/STI_LOGO_for_eLMS.png')}}" class="w-20" alt="">
                    <div class="w-full border-t-2 border-base-300 my-3"></div>
                    <h2 class="text-2xl text-base-content font-semibold">Edit Complaint</h2>
                </div>

                <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Title --}}
                    <div>
                      <x-EditFormLayout type="text" label="Title" name="title" value="{{old('title', $complaint->title)}}"/>
                    </div>
                    {{-- Category --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                        <select name="category"
                                class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-blue-400">
                            <option value="Facilities" {{ $complaint->category == 'Facilities' ? 'selected' : '' }}>Facilities</option>
                            <option value="Faculty" {{ $complaint->category == 'Faculty' ? 'selected' : '' }}>Faculty</option>
                            <option value="Admission" {{ $complaint->category == 'Admission' ? 'selected' : '' }}>Admission</option>
                            <option value="Cashier" {{ $complaint->category == 'Cashier' ? 'selected' : '' }}>Cashier</option>
                            <option value="Registrar" {{ $complaint->category == 'Registrar' ? 'selected' : '' }}>Registrar</option>
                        </select>
                    </div>
                    {{-- Location --}}
                     @if($complaint->location === null)
                        <x-EditFormLayout name="location" hidden/>
                    @else
                        <x-EditFormLayout label="Location" name="location" value="{{old('location', $complaint->location) }}"/>
                    @endif
                    {{-- Description --}}
                    <div>
                    <x-EditFormLayout name="description" label="Description" inputField="textarea">
                        {{ old('description', $complaint->description) }}
                    </x-EditFormLayout>
                    </div>

                    {{-- Incident Time --}}
                    <div>
                        <x-EditFormLayout type="datetime-local" name="incident_time" label="Incident Time" value="{{ old('incident_time', Carbon::parse($complaint->incident_time)->format('Y-m-d\TH:i')) }}"/>
                    </div>

                    {{-- Phone Number --}}
                    <div>
                        <x-EditFormLayout type="text" name="phone_number" label="Phone Number" value="{{ old('phone_number', $complaint->phone_number) }}"/>
                    </div>

                    {{-- Attached Image --}}
                    <div>
                        <x-EditFormLayout name="image_path" label="Attached Image (Optional)" inputField="file"/>
                    </div>

                    {{-- Submit Button --}}
                    <div class="pt-4">
                        <button type="submit"
                                class="bg-neutral hover:bg-neutral-800 text-white px-6 py-2 rounded-md shadow text-sm cursor-pointer">
                            Update Complaint
                        </button>
                    </div>
                </form>
            </div>
        </x-Section>
    </x-HomeNavigationBar>
</x-Layout>
