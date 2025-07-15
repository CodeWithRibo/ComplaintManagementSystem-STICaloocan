@include('Components.register-layout', [
    'action' => route('admin.register'),
    'otherDetails' => null,
    'class' => 'grid grid-cols-1 md:grid-cols-1 gap-5'
])
