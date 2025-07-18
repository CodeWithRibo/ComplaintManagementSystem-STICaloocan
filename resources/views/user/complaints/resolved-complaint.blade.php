@include('Components.complaint-table',
['complaints' => $resolved,
'header' => 'Resolved Complaint',
'resolutionNote' => 'Resolution Note',
'noComplaintFound' => 'No complaints have been resolved yet.',
])

@include('Components.AuthFooter')
