@include('Components.complaint-table',[
'complaints' => $archive,
'header' => 'Archive Complaints',
'resolutionNote' => null,
'noComplaintFound' => 'You have no archived complaints.',
])
@include('Components.AuthFooter')
