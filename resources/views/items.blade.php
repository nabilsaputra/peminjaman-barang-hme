@extends('layouts.mainlayout')

@section('title', 'Items')

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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <h1>Item Lists</h1>
    <div class="my-5 d-flex justify-content-end">
        <a href="item-deleted" class="btn btn-secondary me-2">View Deleted Items</a>
        <a href="item-add" class="btn btn-primary">Add Item</a>
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
                    <th>Code</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $stuff)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $stuff->item_code }}</td>
                        <td>{{ $stuff->item_name }}</td>
                        <td>
                            @if ($stuff->category)
                            {{ $stuff->category->name }}
                            @endif
                        </td>
                        <td>{{ $stuff->status }}</td>
                        <td>
                            <a href="/item-edit/{{$stuff->slug}}" class="btn me-3" style="background-color: #f5a201">Edit</a>
                            <a href="/item-delete/{{$stuff->slug}}" class="btn btn-danger me-3">Delete</a
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection