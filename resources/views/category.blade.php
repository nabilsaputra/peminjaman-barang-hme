@extends('layouts.mainlayout')

@section('title', 'Categories')

@section('page-name', 'Categories')

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
   <h1>Category Lists</h1>

   <div class="mt-5 d-flex justify-content-end">
      <a href="category-deleted" class="btn btn-secondary me-2">View Deleted Categories</a>
      <a href="category-add" class="btn btn-primary">Add Category</a>
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
               <th class="col-lg-1">No</th>
               <th class="col-lg-8">Name</th>
               <th class="col-lg-2">Status</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($categories as $item)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->name }}</td>
                  <td>
                     <div class="d-flex">
                     <a href="category-edit/{{$item->slug}}" class="btn btn-warning me-3">Edit</a>
                     <a href="category-delete/{{$item->slug}}" class="btn btn-danger me-3">Delete</a>
                     </div>
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
@endsection