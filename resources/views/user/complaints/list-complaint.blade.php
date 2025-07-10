@php use Illuminate\Support\Carbon; @endphp

@include('Components.complaint-table',[
'complaints' => $complaintData,
'header' => 'All Complaints',
'resolutionNote' => null
])
@include('Components.AuthFooter')
