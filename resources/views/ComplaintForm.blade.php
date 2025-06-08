<x-layout>
    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
        <form action="{{route('store')}}" method="POST">
            @csrf
            @method('POST')
            <legend class="fieldset-legend">Submit Complaint</legend>
            <input type="text"  name="title" class="input" placeholder="Title" />
            <input type="text" name="description" class="input" placeholder="Description" />
            <input type="datetime-local" name="timeIncident" class="input" placeholder="Date and Time of Incident" />

            <select name="categorySelection" class="input">
                <option value="" disabled selected>Select Category</option>
                <option value="Admission">Admission</option>
                <option value="Faculties">Faculties</option>
                <option value="Cashier">Cashier</option>
                <option value="Registrar">Registrar</option>
            </select>
            <select name="priorityLevel" class="input mt-2">
                <option value="" disabled selected>Select Priority Level</option>
                <option value="low">Low</option>
                <option value="mid">Mid</option>
                <option value="high">High</option>
            </select>
            <button class="btn btn-neutral mt-4">Submit</button>
        </form>
    </fieldset>
</x-layout>

