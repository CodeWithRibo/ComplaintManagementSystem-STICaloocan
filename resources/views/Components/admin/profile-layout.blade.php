@props([
    'route' => ''
])

<form action="{{$route}}" method="POST">
    @csrf
    @method('PUT')
    <div class="space-y-12 bg-white mx-10 my-5 py-5 px-5 rounded-md shadow-lg">
        <div class="border-b border-gray-900/10 pb-12">
            <h1 class="text-base-content text-2xl p-2 my-5 text-center xl:text-start border-l-4 border-primary bg-base-100 shadow-sm rounded-r-lg w-auto xl:w-96">
                Personal Information</h1>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                {{$slot}}
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
            <button type="submit" class="btn btn-primary text-white px-10 ">Save</button>
        </div>
    </div>
</form>
