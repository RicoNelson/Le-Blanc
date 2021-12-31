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
            <img src="{{ URL::asset($product->product_image) }}" class="product-image" alt="">
        </div>

        <div class="container">
            <h1>{{ $product->product_name }}</h1>
            <p>{{ $product->product_description }}</p>

            <div class="lower-card">
                @if ($product->highest_bid === $product->starting_price)
                    STARTING PRICE:
                    <p>USD {{ $product->starting_price }}</p>
                @else
                    HIGHEST BID:
                    <p>USD {{ $product->highest_bid }}</p>
                @endif
                BID END AT:
                <p>{{ $product->end_date }}</p>

                <script>
                    CountDownTimer('{{ $product->end_date }}','countdown-{{ $product->product_id }}');
                    function CountDownTimer(dt, id){
                        var end = new Date(dt);
                        var _second = 1000;
                        var _minute = _second * 60;
                        var _hour = _minute * 60;
                        var _day = _hour * 24;
                        var timer;
                        function showRemaining() {
                            var now = new Date();
                            var distance = end - now;
                            if (distance < 0) {
                
                                clearInterval(timer);
                                return;
                            }
                            var days = Math.floor(distance / _day);
                            var hours = Math.floor((distance % _day) / _hour);
                            var minutes = Math.floor((distance % _hour) / _minute);
                            var seconds = Math.floor((distance % _minute) / _second);
                
                            document.getElementById(id).innerHTML = days + 'days ';
                            document.getElementById(id).innerHTML += hours + 'hrs ';
                            document.getElementById(id).innerHTML += minutes + 'mins ';
                            document.getElementById(id).innerHTML += seconds + 'secs';
                        }
                        timer = setInterval(showRemaining, 1000);
                    }
                </script>
                
                <p id="countdown-{{ $product->product_id }}"></p>

            </div>



            @auth
                @if (auth()->user()->role_id === 2)                    
                    <hr>
                    <h3>Place Your Bid</h3>
                    <form action="/detail-product/{{ $product->product_id }}" method="post">
                        @csrf
                        <div class="d-flex justify-content-start">
                            {{-- <label for="quantityInput">Quantity: </label>
                            <input type="number" name="quantityInput" id="quantityInput" class="ms-3" style="width: 100%; display: block;"> --}}
                            {{-- <label for="bidInput">Bid: </label> --}}
                            <input type="number" name="bidInput" id="bidInput" class="w-100" placeholder="Must Be higher than USD {{ $product->highest_bid }}">
                            <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                            <input type="hidden" name="highest_bid" value="{{ $product->highest_bid }}">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->user_id }}">
                        </div>
                        
                        @if (session()->has('bidError'))
                            <div class="invalid-feedback d-block text-start">
                                {{ session('bidError') }}
                            </div>
                        @endif
                        <button type="submit" class="mt-3 w-100">Submit</button>
                    </form>
                @elseif(auth()->user()->role_id === 1)
                    <a href="/update/{{ $product->product_id }}" class="style-button w-100">Update Product</a>
                @endif
            @endauth
        </div>

    </div>
@endsection