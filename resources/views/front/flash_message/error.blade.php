@if(session('error'))
    <p class="alert alert-danger mt-4">{{ session('message') }}</p>
@endif