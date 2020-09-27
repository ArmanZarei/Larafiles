@extends('layouts.front')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 offset-md-3">
                <div class="card mt-5 border-primary">
                    <div class="card-header text-center border-primary bg-white">
                        <i class="align-middle fa-2x fal fa-user-unlock text-primary"></i>
                        <h4 class="d-inline font-weight-light ml-2 align-middle text-primary">Login</h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach
                        @endif
                        @include('front.flash_message.error')
                        @include('front.flash_message.success')
                        <form method="post" action="{{ route('front.login.action') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                                <label class="custom-control-label" for="customCheck1">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-block mt-4">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection