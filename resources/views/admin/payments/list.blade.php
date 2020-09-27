@extends('layouts.admin')
@section('content')
    @include('admin.flash_message.error')
    @include('admin.flash_message.success')
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Method</th>
            <th>Gateway</th>
            <th>Res. Number</th>
            <th>Ref. Number</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Operations</th>
        </tr>
        </thead>
        @if(isset($payments) && count($payments) > 0)
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->user->name }}</td>
                    <td>{{ $payment->method }}</td>
                    <td>{{ $payment->gateway }}</td>
                    <td>{{ $payment->res_num }}</td>
                    <td>{{ $payment->ref_num }}</td>
                    <td>{{ number_format($payment->amount) }}</td>
                    <td>{{ $payment->status }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.payments.delete',$payment->id) }}" title="delete"><i class="fad fa-trash-alt text-danger"></i></a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">
                    <p class="alert alert-warning mb-0">No Record Found</p>
                </td>
            </tr>
        @endif
    </table>
@endsection