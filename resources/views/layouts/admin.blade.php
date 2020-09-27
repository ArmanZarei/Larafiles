<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Larafiles Admin Pannel</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
@include('admin.partials.nav')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            @if(isset($panel_icon))
                <i class="align-middle fa-2x {{ $panel_icon }}"></i>
            @else
                <i class="align-middle fa-2x fas fa-bars"></i>
            @endif
            <h4 class="d-inline font-weight-light ml-2 align-middle">{{ $panel_title ?? 'No Title Set for this section' }}</h4>
        </div>
        <div class="card-body">
            @yield('content')
        </div>
    </div>
</div>
<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/admin.js')}}"></script>
@yield('javascript')
</body>
</html>