@include('Components.login-layout', [
    'action' => route('login'),
    'header' => 'Login',
    'link' => route('show.register'),
    'name' => 'student_id_number',
    'label' => 'Student ID Number',
    'placeholder' => 'Enter Student ID Number',
])
