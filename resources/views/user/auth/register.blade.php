@include('Components.register-layout', [
    'action' => route('register'),
    'otherDetails' => true,
    'class' => 'grid grid-cols-1 md:grid-cols-2 gap-6'
])
