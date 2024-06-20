@extends('layouts.mainlayout')

@section('title', 'Edit Item')

@section('content')
   <h1>Edit Item</h1>
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

    <form action="/item-edit/{{$item->slug}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" name="item_code" id="code" class="form-control" placeholder="Item Code" value="{{  $item->item_code }}">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name Item</label>
            <input type="text" name="item_name" id="code"  class="form-control" placeholder="Item Name"
            value="{{ $item->item_name }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="code" class="form-control">
        </div>

        <div class="mb-3">
            <label for="cuurrentImage" class="form-label" style="display: block">Current Image</label>
            @if ($item->cover!='')
                <img src="{{ asset('storage/cover/' .$item->cover)}}" alt="" width="300px">
            @else
                <img src="{{ asset('images/imagenotfound.jpg')}}" alt="" width="200px">
            @endif   

        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category_id" id="category" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
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