@if(session('success'))
    <p class="alert alert-success">{{ session('message') }}</p>
@endif