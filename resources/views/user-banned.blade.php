@extends('layouts.mainlayout')

@section('title', 'Banned Users')

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
<h1>Banned User List</h1>
<div class="mt-5 d-flex justify-content-end">
    <a href="/users" class="btn btn-secondary">Back</a>
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
            @foreach ($usersBanned as $item)
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
                        <a href="/user-restore/{{$item->slug}}" class="btn btn-primary me-2">Restore</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection