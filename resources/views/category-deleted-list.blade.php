@extends('layouts.mainlayout')

@section('title', 'Deleted Categories')

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
   <h1>Deleted Category Lists</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="/categories" class="btn btn-secondary">Back</a>
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
               <th>Name</th>
               <th>Status</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($deletedCategories as $item)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->name }}</td>
                  <td>
                     <div class="d-flex"> 
                     <a href="category-restore/{{$item->slug}}" class="btn btn-primary">Restore</a>
                     </div>
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
@endsection