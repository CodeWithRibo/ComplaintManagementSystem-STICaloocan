@include('Components.complaint-table',[
'complaints' => $archived,
'header' => 'Archived Complaints',
'resolutionNote' => null,
'progressNote' => null,
'noComplaintFound' => 'You have no archived complaints.',
])
@include('Components.AuthFooter')
