<x-layout>
    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <!-- head -->
            <thead>
            <tr>
                <th></th>
                <th>Title</th>
                <th>Description</th>
                <th>Category Selection</th>
            </tr>
            </thead>
            <tbody>
            <!-- row 1 -->

            @foreach($complaints as $complaint)
                <tr>
                    <th>{{$complaint->id}}</th>
                    <td>{{$complaint->title}}</td>
                    <td>{{$complaint->description}}</td>
                    <td>{{$complaint->categorySelection}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
