@extends('layouts.admin')
@section('content')
    @include('admin.flash_message.error')
    @include('admin.flash_message.success')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Packages</th>
                <th>Role</th>
                <th>Wallet</th>
                <th>Operations</th>
            </tr>
        </thead>
        @if($users && count($users) > 0)
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->packages->count() }}</td>
                    <td>{{ $user->text_role }}</td>
                    <td>{{ number_format($user->wallet) }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.users.packages',$user->id) }}" title="Packages"><i class="fad fa-archive text-dark"></i></a>
                        <a href="{{ route('admin.users.edit',$user->id) }}"><i class="fas fa-user-edit text-primary"></i></a>
                        <a href="{{ route('admin.users.delete',$user->id) }}"><i class="fas fa-user-times text-danger"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
@endsection