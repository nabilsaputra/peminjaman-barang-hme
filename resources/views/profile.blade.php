@extends('layouts.mainlayout')

@section('title', 'Profile')

@section('content')
    <div class="mt-5">
        <h2>Rent Log</h2>
        <x-transaction-table :rentlog='$rentLogs' />
    </div>
@endsection