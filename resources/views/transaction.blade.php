@extends('layouts.mainlayout')

@section('title', 'Transaction')

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
<h1>Transaction List</h1>
<div class="my-5 d-flex justify-content-end">
    <a href="cetak" target="_blank" class="btn btn-primary">Print Transaction</a>
 </div>

<div class="mt-5">
    <x-transaction-table :rentlog='$rentLogs' />
</div>
@endsection