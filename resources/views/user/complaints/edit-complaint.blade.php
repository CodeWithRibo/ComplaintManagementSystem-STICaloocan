@php use Illuminate\Support\Carbon; @endphp
<x-Layout>
    <x-HomeNavigationBar>
        <x-Section class="md:pt-32">
            <div class="max-w-5xl mx-auto px-4 py-6 bg-white shadow-md rounded-lg" >
                <div class="flex items-center justify-center text-center flex-col">
                    <img src="{{asset('image/STI_LOGO_for_eLMS.png')}}" class="w-20" alt="">
                    <div class="w-full border-t-2 border-base-300 my-3"></div>
                    <h2 class="text-2xl text-base-content font-semibold">Edit Complaint</h2>
                </div>

                <form x-data="{open : false}" action="{{route('complaints.update', $complaint->id)}}" method="POST" enctype="multipart/form-data" class="space-y-6">
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
                            <option value="Facilities"  @click="open = true" {{ $complaint->category == 'Facilities' ? 'selected' : '' }}>Facilities</option>
                            <option value="Faculty" @click="open = false" {{ $complaint->category == 'Faculty' ? 'selected' : '' }}>Faculty</option>
                            <option value="Admission" @click="open = false" {{ $complaint->category == 'Admission' ? 'selected' : '' }}>Admission</option>
                            <option value="Cashier"  @click="open = false"{{ $complaint->category == 'Cashier' ? 'selected' : '' }}>Cashier</option>
                            <option value="Registrar" @click="open = false"{{ $complaint->category == 'Registrar' ? 'selected' : '' }}>Registrar</option>
                        </select>
                    </div>
                    {{-- Location --}}
                        <span x-show="open">
                        <x-EditFormLayout label="Location" name="location" placeholder="e.g., Computer Laboratory 601" value="{{old('location', $complaint->location) }}"/>
                        </span>
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

                    {{-- Attached Image --}}
                    <div>
                        <x-EditFormLayout name="image_path" label="Attached Image (Optional)" type="file"/>
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
