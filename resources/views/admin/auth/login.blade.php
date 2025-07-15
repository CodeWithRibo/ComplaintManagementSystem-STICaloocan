@include('Components.login-layout', [
    'action' => route('admin.login'),
    'header' => 'Login Admin Account',
    'link' => route('admin.register'),
    'name' => 'email',
    'label' => 'Email',
    'placeholder' => 'Enter email',
])
