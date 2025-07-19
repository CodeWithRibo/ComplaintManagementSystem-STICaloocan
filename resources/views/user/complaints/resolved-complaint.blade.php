@include('Components.complaint-table',
['complaints' => $resolved,
'header' => 'Resolved Complaint',
'noComplaintFound' => 'No complaints have been resolved yet.',
'resolutionNote' => 'Resolution Note',
'progressNote' => null,
'accessArchived' => 'Action'
])

@include('Components.AuthFooter')
