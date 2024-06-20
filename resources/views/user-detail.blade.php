@extends('layouts.mainlayout')

@section('title', 'Users')

@section('content')
<h2>User Detail</h2>
<div class="my-2 d-flex justify-content-end">
    @if ($user->status == 'inactive')
        <a href="/user-approve/{{$user->slug}}" class="btn btn-info" style="margin-right: 10px">Approve </a>
    @endif
        <a href="/users" class="btn btn-secondary">Back</a>
</div>
    <div class="mt-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
<div class="my-5 w-25">
    <div class="mb-2">
        <label for="" class="form-label">Username</label>
        <input type="text" class="form-control" readonly value="{{$user->username}}">
    </div>
    <div class="mb-2">
        <label for="" class="form-label">Phone</label>
        <input type="text" class="form-control" readonly value="{{$user->phone}}">
    </div>
    <div class="mb-2">
        <label for="" class="form-label">Address</label>
        <textarea name="" id="" cols="30" rows="5" class="form-control" style="resize: none">{{$user->address}}</textarea>
    </div>
    <div class="mb-2">
        <label for="" class="form-label">Status</label>
        <input type="text" class="form-control" readonly value="{{$user->status}}">
    </div>
    
</div>
<h2>{{$user->username}} Rent Log</h2>
<div class="mt-5">
    <x-transaction-table :rentlog='$rentLogs' />
</div>
@endsection