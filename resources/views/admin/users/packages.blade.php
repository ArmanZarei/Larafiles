@extends('layouts.admin')
@section('content')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Package Name</th>
                <th>Paid amount</th>
                <th>Created at</th>
            </tr>
        </thead>
        @if($packages && count($packages) > 0)
            @foreach($packages as $package)
                <tr>
                    <td>{{ $package->title }}</td>
                    <td>{{ number_format($package->pivot->amount) }}</td>
                    <td>{{ $package->pivot->created_at }}</td>
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