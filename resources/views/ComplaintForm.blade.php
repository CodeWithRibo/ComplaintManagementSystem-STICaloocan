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
                <option value="" disabled selected>Select Category</option>
                <option value="Admission" @selected(old('categorySelection') === 'Admission') >Admission</option>
                <option value="Facilities" @selected(old('categorySelection') === 'Facilities')>Facilities</option>
                <option value="Faculties" @selected(old('categorySelection') === 'Faculties')>Faculties</option>
                <option value="Cashier" @selected(old('categorySelection') === 'Cashier')>Cashier</option>
                <option value="Registrar" @selected(old('categorySelection') === 'Registrar')>Registrar</option>
            </select>

            <input type="text" name="locationDetails" id="locationDetails" class="input mt-2 hidden"
                   placeholder="Enter location details">
            <input type="text" name="facultyName" id="facultyName" class="input mt-2 hidden"
                   placeholder="Enter faculty name">
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const categorySelect = document.querySelector("[name='categorySelection']");
                    const facilitiesField = document.getElementById("locationDetails");
                    const facultiesField = document.getElementById("facultyName");

                    categorySelect.addEventListener("change", function () {
                        const selectedCategory = categorySelect.value;

                        facilitiesField.style.display = "none";
                        facultiesField.style.display = "none";


                        if (selectedCategory === "Facilities") {
                            facilitiesField.style.display = "block";
                        } else if (selectedCategory === "Faculties") {
                            facultiesField.style.display = "block";
                        }
                    });
                });
            </script>


            @error('categorySelection')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <select name="priorityLevel" class="input mt-2">
                <option value="" disabled selected>Select Priority Level</option>
                <option value="Low" @selected(old('priorityLevel') === 'Low')>Low</option>
                <option value="Mid" @selected(old('priorityLevel') === 'Mid')>Mid</option>
                <option value="High" @selected(old('priorityLevel') === 'High')>High</option>
            </select>
            @error('priorityLevel')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button class="btn btn-neutral mt-4">Submit</button>
        </fieldset>
    </form>
</x-layout>

