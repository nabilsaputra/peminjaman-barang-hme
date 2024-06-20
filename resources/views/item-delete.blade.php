@extends('layouts.mainlayout')

@section('title', 'Delete Item')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
</style>

@section('content')
    <div class="delete-box d-flex flex-column justify-content-center align-items-center">
        <h2>Are you sure want to delete {{$item->item_name}} ?</h2>
        <div class="mt-5">
            <a href="/item-trash/{{$item->slug}}" class="btn btn-danger me-2">Sure</a>
            <a href="/items" class="btn btn-primary">Cancel</a>
    </div>
    </div>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

@endsection