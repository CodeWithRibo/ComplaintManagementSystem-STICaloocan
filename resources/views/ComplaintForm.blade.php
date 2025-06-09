<x-layout>
    <form action="{{route('store')}}" method="POST">
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
            @csrf
            @method('POST')

            <legend class="fieldset-legend">Submit Complaint</legend>
            <input type="text" name="title" class="input @error('title') @enderror" placeholder="Title" value="{{ old('title') }}" />
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="description" class="input" placeholder="Description" value="{{ old('description') }}" />
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="datetime-local" name="timeIncident" class="input" placeholder="Date and Time of Incident" value="{{ old('timeIncident') }}" />
            @error('timeIncident')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <select name="categorySelection" class="input">
               <option value="" disabled {{ old('categorySelection') ? '' : 'selected' }}>Select Category</option>
               <option value="Admission" {{ old('categorySelection') == 'Admission' ? 'selected' : '' }}>Admission</option>
               <option value="Facilities" {{ old('categorySelection') == 'Facilities' ? 'selected' : '' }}>Facilities</option>
               <option value="Faculties" {{ old('categorySelection') == 'Faculties' ? 'selected' : '' }}>Faculties</option>
               <option value="Cashier"  {{ old('categorySelection') == 'Cashier' ? 'selected' : '' }}>Cashier</option>
               <option value="Registrar" {{ old('categorySelection') == 'Registrar' ? 'selected' : '' }}>Registrar</option>
            </select>
            @error('categorySelection')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <select name="priorityLevel" class="input mt-2">
                <option value="{{ old('priorityLevel') }}" disabled selected>Select Priority Level</option>
                <option value="Low">Low</option>
                <option value="Mid">Mid</option>
                <option value="High">High</option>
            </select>
            @error('priorityLevel')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button class="btn btn-neutral mt-4">Submit</button>
        </fieldset>
    </form>
</x-layout>

