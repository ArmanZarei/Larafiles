@extends('layouts.admin')
@section('content')
    @include('admin.flash_message.error')
    @include('admin.flash_message.success')
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Download Count</th>
            <th>Price</th>
            <th>Days Count</th>
            <th>Operations</th>
        </tr>
        </thead>
        @if(isset($plans) && count($plans) > 0)
            @foreach($plans as $plan)
                <tr>
                    <td>{{ $plan->id }}</td>
                    <td>{{ $plan->title }}</td>
                    <td>{{ $plan->download_limit }}</td>
                    <td>{{ $plan->price }}</td>
                    <td>{{ $plan->days_count }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.plans.edit',$plan->id) }}" title="edit"><i class="fad fa-edit text-primary"></i></a>
                        <a href="{{ route('admin.plans.delete',$plan->id) }}" title="delete"><i class="fad fa-trash-alt text-danger"></i></a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6">
                    <p class="alert alert-warning mb-0">No Record Found</p>
                </td>
            </tr>
        @endif
    </table>
@endsection