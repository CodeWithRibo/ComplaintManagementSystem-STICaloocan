@include('Components.login-layout', [
    'action' => route('admin.login'),
    'header' => 'Login Admin Account',
    'link' => route('admin.register'),
    'name' => 'user_name',
    'label' => 'Username',
    'placeholder' => 'Enter Username',
])
