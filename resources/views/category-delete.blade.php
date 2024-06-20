@extends('layouts.mainlayout')

@section('title', 'Delete Category')

@section('content')
<style>
    
    .delete-box {
        margin-top: 150px;
        border: 3px solid black;
        width: 60%;
        margin-left: 220px;
        background-color: #fff;
    }
    .btn {
        width: 100px;
        margin-bottom: 10px
    }
    h2{
        padding: 5px;
    }
</style>
    <div class="delete-box d-flex flex-column justify-content-center align-items-center">
        <h2>Are you sure want to delete Category {{$category->name}} ?</h2>
        <div class="mt-5">
            <a href="/category-trash/{{$category->slug}}" class="btn btn-danger me-2">Sure</a>
            <a href="/categories" class="btn btn-primary">Cancel</a>
        </div>
    </div>
@endsection