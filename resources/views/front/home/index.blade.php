@extends('layouts.front')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                @include('front.flash_message.error')
                @include('front.flash_message.success')
                @include('front.home.files')
                @include('front.home.packages')
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card mt-4">
                    <div class="card-header">
                        <i class="align-middle fa-2x fad fa-layer-group categories-color-text"></i>
                        <h4 class="d-inline font-weight-light ml-2 align-middle categories-color-text">Categories</h4>
                    </div>
                    <div class="card-body">
                        @if(isset($categories) && count($categories) > 0)
                            <ul class="list-group">
                                @foreach($categories as $category)
                                    <li class="list-group-item p-0 border-0">
                                        <a class="list-group-item-action list-group-item" href="{{ route('front.categories.single', $category->id) }}">
                                            {{ $category->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="alert alert-info text-center mb-0">No Records found</p>
                        @endif
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header">
                        <i class="align-middle fa-2x fal fa-heart-circle text-info"></i>
                        <h4 class="d-inline font-weight-light ml-2 align-middle text-info">Most Popular</h4>
                    </div>
                    <div class="card-body">
                        @if(isset($popularFiles) && count($popularFiles) > 0)
                            <ul class="list-group">
                                @foreach($popularFiles as $file)
                                    <li class="list-group-item p-0 border-0">
                                        <a class="list-group-item-action list-group-item" href="{{ route('front.file.details', $file->id) }}">
                                            {{ $file->title }}
                                            <span class="badge border border-secondary">
                                                <i class="fas fa-arrow-to-bottom text-secondary"></i>
                                                {{ $file->download_count }}
                                            </span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="alert alert-info text-center mb-0">No Records found</p>
                        @endif
                    </div>
                </div>
                @if(\Illuminate\Support\Facades\Auth::check())
                    <div class="card mt-4">
                        <div class="card-header">
                            <i class="align-middle fa-2x fal fa-user-clock text-danger"></i>
                            <h4 class="d-inline font-weight-light ml-2 align-middle text-danger">Last Activity</h4>
                        </div>
                        <div class="card-body">
                            <div class="btn btn-danger btn-block">
                                {{ session('last_activity') }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection