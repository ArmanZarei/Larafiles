@extends('layouts.admin')
@section('content')
    @include('admin.flash_message.error')
    @include('admin.flash_message.success')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Type</th>
                <th>Size</th>
                <th>Operations</th>
            </tr>
        </thead>
        @if(isset($files) && count($files) > 0)
            @foreach($files as $file)
                <tr>
                    <td>{{ $file->id }}</td>
                    <td>{{ $file->title }}</td>
                    <td>{{ $file->description }}</td>
                    <td>{{ $file->file_type_text }}</td>
                    <td>{{ $file->size_formatted }}</td>
                    <td class="text-center">
                        <a href="" title="edit"><i class="fad fa-edit text-primary"></i></a>
                        <a href="" title="delete"><i class="fad fa-trash-alt text-danger"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
@endsection