@include('Components.complaint-table',[
'complaints' => $pending,
'header' => 'Pending Complaints',
'resolutionNote' => null,
'progressNote' => null,
'noComplaintFound' => 'No complaints are currently marked as pending',
])
@include('Components.AuthFooter')
