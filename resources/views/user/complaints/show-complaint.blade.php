@include('Components.complaint-table',[
'complaints' => $complaintData,
'header' => 'Edit Complaint',
'resolutionNote' => null,
'progressNote' => null,
'noComplaintFound' => 'No complaints are currently edit.',
'action' => true
])
@include('Components.AuthFooter')
