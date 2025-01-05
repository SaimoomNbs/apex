<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Management</title>
    <link rel="stylesheet" href="{{asset('asset/bootstrap-5/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/fontawesome-6/css/all.css')}}" />
    @yield('style')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{route('products.index')}}"><img src="https://laravel.com/img/logomark.min.svg" width="75%"></a>
            <div class="text-end">
                <a href="{{route('cart')}}" class="btn btn-warning position-relative me-2 d-lg-none d-inline">
                    <i class="fa-solid fa-cart-shopping"></i>
                    @php $count = count(session()->get('cart', [])) @endphp
                    @if($count > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{$count}}
                        <span class="visually-hidden">product quantity</span>
                    </span>
                    @endif
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a href="{{route('products.index')}}" class="nav-link text-white">Home</a></li>
                    <li class="nav-item"><a href="{{route('products.create')}}" class="nav-link text-white">Create Product</a></li>
                </ul>
            </div>
            <div class="text-end d-none d-lg-block">
                <a href="{{route('cart')}}" class="btn btn-warning position-relative me-2">
                    <i class="fa-solid fa-cart-shopping"></i>
                    @php $count = count(session()->get('cart', [])) @endphp
                    @if($count > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{$count}}
                        <span class="visually-hidden">product quantity</span>
                    </span>
                    @endif
                </a>
            </div>
        </div>
    </nav>
    <!-- <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="https://laravel.com/img/logomark.min.svg" width="75%">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{route('products.index')}}" class="nav-link px-2 text-white">Home</a></li>
                    <li><a href="{{route('products.create')}}" class="nav-link px-2 text-white">Create Product</a></li>
                </ul>

                <div class="text-end">
                    <a href="{{route('cart')}}" class="btn btn-warning position-relative">
                        <i class="fa-solid fa-cart-shopping"></i>
                        @php $count = count(session()->get('cart', [])) @endphp
                        @if($count > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{$count}}
                            <span class="visually-hidden">product quantity</span>
                        </span>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </header> -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="{{asset('asset/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('asset/bootstrap-5/js/bootstrap.min.js')}}"></script>
    @yield('script')
</body>

</html>