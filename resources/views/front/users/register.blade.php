@extends('layouts.front')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6 offset-md-3">
            <div class="card mt-5 border-success">
                <div class="card-header text-center border-success bg-white">
                    <i class="align-middle fa-2x fal fa-user-plus text-success"></i>
                    <h4 class="d-inline font-weight-light ml-2 align-middle text-success">Register</h4>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                    @endif
                    @include('front.flash_message.error')
                    <form method="post" action="{{ route('front.register.action') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="password">Re-Password</label>
                            <input type="password" class="form-control" id="password" name="rePassword">
                        </div>
                        <button type="submit" class="btn btn-outline-success btn-block mt-4">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection