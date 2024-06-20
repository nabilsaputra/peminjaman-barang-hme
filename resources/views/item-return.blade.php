@extends('layouts.mainlayout')

@section('title', 'Item Return')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3">
        <h1 class="mb-5">Item Return Form</h1>

        <div class="mt-5">
            @if (session('message'))
                  <div class="alert {{session('alert-class')}}">
                      {{ session('message') }}
                  </div>
            @endif
         </div>
         
        <form action="item-return" method="post">
            <div class="mb-3">
                @csrf
                <label for="user" class="form-label">User</label>
                <select name="user_id" id="user" class="form-control userbox">
                    <option value="">Select User</option>
                    @foreach ($users as $item)
                        <option value="{{ $item->id}}">{{ $item->username }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3" method="post">
                <label for="item" class="form-label">Item</label>
                <select name="item_id" id="item" class="form-control itembox">
                    <option value="">Select Item</option>
                    @foreach ($items as $item)
                        <option value="{{ $item->id}}">{{$item->item_code}} - {{ $item->item_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary w-100" >Submit</button>    
            </div>        
        </form>    
    </div>      
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.userbox').select2();
            $('.itembox').select2();
        });
    </script>       
    </div>
@endsection

