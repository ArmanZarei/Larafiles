@extends('layouts.front')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9">
                <div class="card mt-4">
                    <div class="card-header">
                        <i class="align-middle fa-2x fad fa-archive files-color-text"></i>
                        <h4 class="d-inline font-weight-light ml-2 align-middle files-color-text">{{ $package->title }}</h4>
                    </div>
                    <div class="p-4">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action disabled bg-info text-white text-center">
                                Files
                            </a>
                            @if(count($package_files) > 0)
                                @foreach($package_files as $file)
                                    <a href="{{ route('front.file.details', $file->id) }}" class="list-group-item list-group-item-action">{{ $file->title }}</a>
                                @endforeach
                            @else
                                <a href="" class="list-group-item list-group-item-action disabled">No files are in this package.</a>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <i class="fal fa-calendar-alt text-dark"></i>
                        {{ $package->created_at }}
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="card mt-4">
                    <div class="card-header">
                        <i class="align-middle fa-2x fad fa-download text-success"></i>
                        <h5 class="d-inline font-weight-light ml-2 align-middle text-success">Buy Package</h5>
                    </div>
                    <div class="card-body">
                        <a href="" class="btn btn-success btn-block">Buy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
