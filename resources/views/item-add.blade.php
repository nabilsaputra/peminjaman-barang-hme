@extends('layouts.mainlayout')

@section('title', 'Add Item')

@section('content')
   <h1>Add New Item</h1>
   <div class="mt-5 w-50">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="item-add" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" name="item_code" id="code" class="form-control" placeholder="Item Code" value="{{ old('item_code')}}">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name Item</label>
            <input type="text" name="item_name" id="code"  class="form-control" placeholder="Item Name"
            value="{{ old('item_name')}}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="code" class="form-control">
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category id</label>
            <select name="category_id" id="category" class="form-control">
                <option value="">Choose Category</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id}}"> {{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-3">
            <button class="btn btn-primary me-2" type="submit">Save</button>
            <a href="/items" class="btn btn-secondary">Back</a>
        </div>
    </form>
   </div>
@endsection