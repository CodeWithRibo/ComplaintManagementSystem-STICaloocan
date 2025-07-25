@props(['header' => ' ' ])

<!-- 🔍 Filters with Search Bar -->
<div class="flex flex-wrap justify-between items-center gap-4 mb-4 px-4 pt-5">
    <div class="order-1">
        <h1 class="text-base-content text-2xl p-2 my-5 text-center xl:text-start border-l-4 border-primary bg-base-100 shadow-sm rounded-r-lg w-auto xl:w-96">{{$header}}</h1>
    </div>
    <!-- Search Input -->
    <div class="w-full md:w-1/3 order-2">
        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search Complaints</label>
        {{$slot}}
    </div>
</div>
