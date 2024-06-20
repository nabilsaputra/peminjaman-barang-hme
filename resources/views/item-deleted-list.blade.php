@extends('layouts.mainlayout')

@section('title', 'Deleted Items')

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
   <h1>Deleted Item Lists</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="/items" class="btn btn-secondary">Back</a>
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
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($deletedItems as $item)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->item_code }}</td>
                  <td>{{ $item->item_name }}</td>
                  <td>
                    @if ($item->category)
                            {{ $item->category->name }}
                            @endif
                  </td>
                  <td>
                    <div class="d-flex"> 
                        <a href="item-restore/{{$item->slug}}" class="btn btn-primary">Restore</a>
                        {{-- <form action="{{ route('items.destroy', $item->slug) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item permanently?');">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-danger ms-2">Delete Permanently</button>
                       </form> --}}
                     </div>
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
@endsection