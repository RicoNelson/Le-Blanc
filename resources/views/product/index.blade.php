@extends('layouts.main')

@section('body')

    @if (session()->has('addToCartSuccess'))
        <div class="container d-flex justify-content-center mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('addToCartSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container d-flex justify-content-center mt-5">
        <div class="container d-flex justify-content-center">
            <img src="{{ URL::asset($product->product_image) }}" alt="">
        </div>

        <div class="container">
            <h1>{{ $product->product_name }}</h1>
            <h3>Description: </h3>
            <p>{{ $product->product_description }}</p>

            <h3>Stock: </h3>
            <p>{{ $product->stock }} piece(s)</p>

            <h3>Price: </h3>
            <p>Rp. {{ $product->price }},-</p>

            @auth
                @if (auth()->user()->role_id === 2)                    
                    <hr>
                    <h2>Add To Cart</h2>
                    <form action="/detail-product/{{ $product->product_id }}" method="post">
                        @csrf
                        <div class="d-flex justify-content-start">
                            <label for="quantityInput">Quantity: </label>
                            <input type="number" name="quantityInput" id="quantityInput" class="ms-3" style="width: 100%; display: block;">
                            <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                            <input type="hidden" name="stock" value="{{ $product->stock }}">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->user_id }}">
                        </div>
                        
                        @if (session()->has('quantityError'))
                            <div class="invalid-feedback d-block text-start">
                                {{ session('quantityError') }}
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>

                    
                @endif
            @endauth
        </div>

    </div>
@endsection