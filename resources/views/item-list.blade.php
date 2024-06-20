@extends('layouts.mainlayout')

@section('title', 'Item List')

@section('content')
    <div class="my-5">
        <div class="row">
            @foreach ($items as $item)
                <div class="col-lg-3  col-md-4 col-sm-6 mb-3">
                    <div class="card h-100">
                        <img src="{{ $item->cover != null ? asset('storage/cover/'.$item->cover) : asset('images/imagenotfound.jpg')}}" class="card-img-top" draggable="false">

                        <div class="card-body">
                        <h5 class="card-title">{{ $item->item_code }}</h5>
                        <p class="card-text">{{ $item->item_name }}</p>
                        <p class="card-text fw-bold text-end {{ $item->status == 'in stock' ? 'text-success' : 'text-danger'}}">
                            {{ $item->status }}
                        </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>                                 
@endsection

