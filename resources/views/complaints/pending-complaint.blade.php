@php use Illuminate\Support\Carbon; @endphp

@include('Components.complaint-table',[
'complaints' => $pending,
'header' => 'Pending Complaints'
])
