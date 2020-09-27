@extends('layouts.admin')
@section('content')
    @include('admin.flash_message.error')
    @include('admin.flash_message.success')
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Price</th>
            <th>Files</th>
            <th>Operations</th>
        </tr>
        </thead>
        @if(isset($packages) && count($packages) > 0)
            @foreach($packages as $package)
                <tr>
                    <td>{{ $package->id }}</td>
                    <td>{{ $package->title }}</td>
                    <td>{{ $package->price }}</td>
                    <td>{{ $package->files()->get()->count() }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.packages.edit',$package->id) }}" title="edit"><i class="fad fa-edit text-primary"></i></a>
                        <a href="{{ route('admin.packages.delete',$package->id) }}" title="delete"><i class="fad fa-trash-alt text-danger"></i></a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">
                    <p class="alert alert-warning mb-0">No Record Found</p>
                </td>
            </tr>
        @endif
    </table>
@endsection