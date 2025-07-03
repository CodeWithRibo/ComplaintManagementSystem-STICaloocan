@php use Illuminate\Support\Carbon; @endphp

@include('Components.complaint-table',[
'complaints' => $complaintData,
'header' => 'Pending Complaints'
])
