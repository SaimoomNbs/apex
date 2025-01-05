@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-12 col-md-8">
        {{-- Success Message --}}
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}.</p>
            @endforeach
        </div>
        @endif

        <h1 class="mb-4">Product Cart</h1>

        @if (session()->has('cart') && count(session()->get('cart')) > 0)
        <div class="py-4 bg-light rounded">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Option</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0; @endphp
                                    @foreach (session('cart') as $key => $item)
                                    @php
                                        $subtotal = $item['price'] * $item['quantity'];
                                        $total += $subtotal;
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('storage/' . $item['img']) }}" alt="{{ $item['name'] }}" class="img-thumbnail me-2" width="55">
                                                <span>{{ $item['name'] }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $item['option'] }}</td>
                                        <td>৳{{ number_format($item['price'], 2) }}</td>
                                        <td>{{ $item['quantity'] }}</td>
                                        <td>৳{{ number_format($subtotal, 2) }}</td>
                                        <td>
                                            <form action="{{ route('cart.remove', $key) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Remove
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="text-end"><strong>Total:</strong></td>
                                        <td><strong>৳{{ number_format($total, 2) }}</strong></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('products.index') }}" class="btn btn-primary">Continue Shopping</a>
                            <a href="#" class="btn btn-success">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-warning">Your cart is empty.</div>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Continue Shopping</a>
        @endif
    </div>
</div>
@endsection

@section('script')
@endsection
