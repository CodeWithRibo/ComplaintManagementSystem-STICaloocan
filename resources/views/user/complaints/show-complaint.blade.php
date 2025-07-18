@include('Components.complaint-table',[
'complaints' => $complaintData,
'header' => 'In Progress Complaints',
'resolutionNote' => null,
'noComplaintFound' => 'No complaints are currently in progress.',
'action' => true
])
@include('Components.AuthFooter')
