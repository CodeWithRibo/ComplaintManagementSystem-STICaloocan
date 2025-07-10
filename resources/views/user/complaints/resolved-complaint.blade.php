@include('Components.complaint-table',
['complaints' => $resolved,
'header' => 'Resolved Complaint',
'resolutionNote' => 'Resolution Note'
])

@include('Components.AuthFooter')
