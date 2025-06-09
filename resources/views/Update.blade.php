<x-layout>
    <form action="{{route('update', $data->id)}}" method="post">
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
            @csrf
            @method('PUT')
            <legend class="fieldset-legend">Submit Complaint</legend>
            <input type="text"  name="title" class="input" placeholder="Title" value="{{$data->title}}" />
            <input type="text" name="description" class="input" placeholder="Description" value="{{$data->description}}" />
            <input type="datetime-local" name="timeIncident" class="input" placeholder="Date and Time of Incident" value="{{$data->timeIncident}}" />

            <select name="categorySelection" class="input" >
                <option value="" disabled>Select Category</option>
                <option value="Admission" @selected (old('categorySelection',$data->categorySelection) === 'Admission')>Admission</option>
                <option value="Facilities" @selected (old('categorySelection',$data->categorySelection) === 'Facilities')>Facilities</option>
                <option value="Faculties" @selected (old('categorySelection',$data->categorySelection) === 'Faculties')>Faculties</option>
                <option value="Cashier" @selected (old('categorySelection',$data->categorySelection) === 'Cashier')>Cashier</option>
                <option value="Registrar" @selected (old('categorySelection',$data->categorySelection) === 'Registrar')>Registrar</option>
            </select>
            <select name="priorityLevel" class="input mt-2">
                <option value="" disabled>Select Priority Level</option>
                <option value="Low" @selected (old('priorityLevel',$data->priorityLevel) === 'Low')>Low</option>
                <option value="Mid" @selected (old('priorityLevel',$data->priorityLevel) === 'Mid')>Mid</option>
                <option value="High" @selected (old('priorityLevel',$data->priorityLevel) === 'High')>High</option>
            </select>
            <button class="btn btn-neutral mt-4">Submit</button>
        </fieldset>
    </form>
</x-layout>
