@extends('layouts.app')

@section('style')@endsection
@section('content')
<h2 class="my-5 text-center">Product List</h2>
<div class="py-5 bg-light rounded">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @forelse ($products as $product)
            <div class="col">
                <form action="{{ route('cart.add', $product->id) }}" method="post">
                    @csrf
                    <div class="card shadow-sm rounded">
                        <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg> -->

                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">Category: {{ $product->category }}</p>
                            <div id="carouselExampleControls{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($product->options as $index => $option)
                                    <div class="card carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <div class="card-body d-flex">
                                            <input type="radio" class="form-check-input align-self-center me-2" name="option_id" value="{{ $option->id}}" required>
                                            <img src="{{ asset('storage/' . $option->image_path) }}" alt="{{ $option->name }}" loading="lazy" class="img-thumbnail me-2" width="55">
                                            <div>
                                                <strong>{{ $option->name }}</strong><br>৳{{ $option->price }}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <ol class="carousel-indicators position-relative">
                                    @foreach ($product->options as $index => $option)
                                    <li data-bs-target="#carouselExampleControls{{ $product->id }}" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }} bg-primary"></li>
                                    @endforeach
                                </ol>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <button class="btn btn-sm btn-outline-secondary" type="submit"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($option->created_at)->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @empty
            <div class="col-12 text-center">
                <h6 class="text-danger">No product available.</h6><br>
                <a href="{{route('products.create')}}" class="btn btn-sm btn-dark"><i class="fa-solid fa-plus"></i> add product</a>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
@section('script')@endsection