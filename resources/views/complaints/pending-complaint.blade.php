@include('Components.complaint-table',[
'complaints' => $pending,
'header' => 'Pending Complaints'
])
@include('Components.AuthFooter')
