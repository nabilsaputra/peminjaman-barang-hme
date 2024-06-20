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
<h1>Active User List</h1>
<div class="my-5 d-flex justify-content-end">
    <a href="/user-banned" class="btn btn-secondary me-2">View Banned Users</a>
    <a href="/inactive-users" class="btn btn-warning">Inactive Users</a>
</div>

    <div class="mt-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
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
            @foreach ($users as $item)
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
                        <a href="/user-detail/{{$item->slug}}" class="btn btn-info me-2">Detail</a>
                        <a href="/user-ban/{{$item->slug}}" class="btn btn-danger me-2">Ban</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection