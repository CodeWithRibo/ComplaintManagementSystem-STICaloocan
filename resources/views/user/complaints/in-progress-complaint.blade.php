@include('Components.complaint-table',[
'complaints' => $inProgress,
'header' => 'In Progress Complaints',
'resolutionNote' => null,
'noComplaintFound' => 'No complaints are currently in progress.',
])
@include('Components.AuthFooter')
