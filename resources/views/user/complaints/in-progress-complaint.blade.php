@include('Components.complaint-table',[
'complaints' => $inProgress,
'header' => 'In Progress Complaints',
'noComplaintFound' => 'No complaints are currently in progress.',
'resolutionNote' => null,
'progressNote' => 'Progress Note'
])
@include('Components.AuthFooter')
