@php use Illuminate\Support\Carbon; @endphp

@include('Components.complaint-table',[
'complaints' => $complaintData,
'header' => 'All Complaints',
'resolutionNote' => null,
'progressNote' => null,
'noComplaintFound' => 'No currently summited complaint yet '
])
@include('Components.AuthFooter')
