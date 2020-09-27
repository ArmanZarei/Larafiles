@if(session('error'))
    <p class="alert alert-danger">{{ session('message') }}</p>
@endif