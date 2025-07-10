@include('Components.complaint-table',[
'complaints' => $pending,
'header' => 'Pending Complaints',
'resolutionNote' => null
])
@include('Components.AuthFooter')
