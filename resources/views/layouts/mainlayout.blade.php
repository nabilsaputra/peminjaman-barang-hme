<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PemBar HME | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-expand-lg navbar-custom navbar-dark">
            <div class="container-fluid" >
              <a class="navbar-brand" href="#">Peminjaman Barang HME  
                <div class="poliban" style="display: inline-block">
                    <img src="images/LogoPoliban.png" class="logpol">
                    <img src="images/hme.png" class="loghme">
                </div>
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
        </nav>

        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarSupportedContent">
                        @if (Auth::user())
                            @if (Auth::user()->role_id == 1)
                                <a href="/dashboard" 
                                @if(request()->route()->uri == 'item-edit/{slug}' ||
                                request()->route()->uri == 'category-edit/{slug}'||
                                request()->route()->uri == 'item-delete/{slug}' || 
                                request()->route()->uri == 'category-delete/{slug}' ||
                                request()->route()->uri == 'user-detail/{slug}' ||
                                request()->route()->uri == 'user-banned/{slug}') hidden
                                @elseif(request()->route()->uri == 'dashboard')class='active'
                                    @endif>Dashboard
                                </a>

                                <a href="/items" 
                                @if(request()->route()->uri == 'items' || 
                                request()->route()->uri == 'item-add' || 
                                request()->route()->uri == 'item-edit/{slug}' || 
                                request()->route()->uri == 'item-deleted' || 
                                request()->route()->uri == 'item-delete/{slug}') class='active'
                                    @endif>Items</a>

                                    

                                <a href="/categories" 
                                @if(request()->route()->uri == 'categories' ||
                                request()->route()->uri == 'category-add' || 
                                request()->route()->uri == 'category-edit/{slug}' ||
                                request()->route()->uri == 'category-deleted' || 
                                request()->route()->uri == 'category-delete/{slug}') class='active'
                                    @endif>Categories</a>

                                <a href="/users" 
                                   @if(request()->route()->uri == 'users' || 
                                        request()->route()->uri == 'inactive-users' || 
                                        request()->route()->uri == 'user-detail/{slug}' || 
                                        request()->route()->uri == 'user-ban/{slug}' || 
                                        request()->route()->uri == 'user-banned')  class='active'
                                    @endif>Users
                                </a>

                                <a href="transaction" 
                                    @if(request()->route()->uri == 'item-edit/{slug}' ||
                                        request()->route()->uri == 'category-edit/{slug}'||
                                        request()->route()->uri == 'item-delete/{slug}' || 
                                        request()->route()->uri == 'category-delete/{slug}' ||
                                        request()->route()->uri == 'user-detail/{slug}' ||
                                        request()->route()->uri == 'user-ban/{slug}') hidden
                                    @elseif(request()->route()->uri == 'transaction')class='active'
                                    @endif>Transaction
                                </a>
                            
                                    <a href="item-return"
                                        @if(request()->route()->uri == 'item-edit/{slug}' ||
                                        request()->route()->uri == 'category-edit/{slug}' || 
                                        request()->route()->uri == 'item-delete/{slug}' || 
                                        request()->route()->uri == 'category-delete/{slug}' ||
                                        request()->route()->uri == 'user-detail/{slug}' ||
                                        request()->route()->uri == 'user-ban/{slug}')hidden
                                        @elseif(request()->route()->uri == 'item-return')class='active'
                                        @endif>
                                        Item Return
                                    </a>
                                <a href="/logout" 
                                        @if(request()->route()->uri == 'item-edit/{slug}' ||
                                        request()->route()->uri == 'category-edit/{slug}' || 
                                        request()->route()->uri == 'item-delete/{slug}' || 
                                        request()->route()->uri == 'category-delete/{slug}' ||
                                        request()->route()->uri == 'user-detail/{slug}' ||
                                        request()->route()->uri == 'user-ban/{slug}')hidden
                                        @elseif(request()->route()->uri == 'logout')class='active'
                                        @endif>
                                        Logout
                                </a>
                                
                            @else
                                <a href="/profile" @if(request()->route()->uri == 'profile') class='active'
                                    @endif>Profile</a>
                                <a href="/" @if(request()->route()->uri == '/') class='active'
                                        @endif>Item List</a>
                                 <a href="item-rent" @if(request()->route()->uri == 'item-rent') class='active'
                                            @endif>Item Rent</a>
                                <a href="/logout" @if(request()->route()->uri == 'logout') class='active'
                                    @endif>Logout</a>
                            @endif
                            @else
                            <a href="/login" @if(request()->route()->uri == 'login') class='active'
                                @endif>Login</a>
                        @endif

                </div>
                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>
                
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>