@extends('layouts.mainlayout')

@section('title', 'Users')

@section('content')
<style>
    .table{
        /* background-color:rgba(71, 178, 228, 0.5); */
        background-color: #fff;
        border: 1px solid #000;
    }

    thead{
        background-color: #D6EEEE;
    }
</style>
<h1>Inactive User List</h1>
<div class="my-5 d-flex justify-content-end">
    <a href="/users" class="btn btn-primary">Active Users</a>
</div>

<div class="my-5">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inactiveUsers as $item)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $item->username }}</td>
                    <td>
                        @if ( $item->phone )
                            {{ $item->phone }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="/user-detail/{{$item->slug}}" class="btn btn-info me-2">Approve User</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection