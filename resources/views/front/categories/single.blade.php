@extends('layouts.front')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-4">

                <h4 class="alert alert-info mb-0 text-center text-info">Category : {{ $category->title }}</h4>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="card mt-4">
                    <div class="card-header">
                        <i class="align-middle fa-2x fad fa-folders files-color-text"></i>
                        <h4 class="d-inline font-weight-light ml-2 align-middle files-color-text">Files</h4>
                    </div>
                    <div class="card-body">
                        @if(isset($files) && count($files) > 0)
                            <ul class="list-group">
                                @foreach($files as $file)
                                    <li class="list-group-item p-0 border-0">
                                        <a class="list-group-item-action list-group-item" href="{{ route('front.file.details', $file->id) }}">
                                            {{ $file->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="alert alert-info text-center mb-0">No Records found</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="card mt-4">
                    <div class="card-header">
                        <i class="align-middle fa-2x fad fa-folders packages-color-text"></i>
                        <h4 class="d-inline font-weight-light ml-2 align-middle packages-color-text">Packages</h4>
                    </div>
                    <div class="card-body">
                        @if(isset($packages) && count($packages) > 0)
                            <ul class="list-group">
                                @foreach($packages as $package)
                                    <li class="list-group-item p-0 border-0">
                                        <a class="list-group-item-action list-group-item" href="{{ route('front.package.details', $package->id) }}">
                                            {{ $package->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="alert alert-info text-center mb-0">No Records found</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection