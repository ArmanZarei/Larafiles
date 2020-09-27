@extends('layouts.admin')
@section('content')
    @include('admin.flash_message.error')
    @include('admin.flash_message.success')
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Operations</th>
        </tr>
        </thead>
        @if(isset($categories) && count($categories) > 0)
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.categories.edit',$category->id) }}" title="edit"><i class="fad fa-edit text-primary"></i></a>
                        <a href="{{ route('admin.categories.delete',$category->id) }}" title="delete"><i class="fad fa-layer-minus text-danger"></i></a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3">
                    <p class="alert alert-warning mb-0">No Record Found</p>
                </td>
            </tr>
        @endif
    </table>
@endsection