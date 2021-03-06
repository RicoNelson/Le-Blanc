@extends('layouts.main')

@section('body')
<div class="container">
    <form action="/search" class="mt-5 d-flex align-items-center">
        <div class="d-flex align-items-center form-group add-margin-right">
            <label class="mr-3 add-margin-right" for="inlineFormCustomSelect">Category</label>
            <select class="form-control form-select" id="inlineFormCustomSelect" name="category">
                <option @if(request('category') === null) selected @endif value="">Category</option>
                @foreach ($category as $cat)
                    <option value="{{ $cat->category_id }}" @if(request('category') === "$cat->category_id") selected @endif>{{ $cat->category_name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group add-margin-right col-9">
            <input type="text" name="product_name" class="form-control" id="product_name" value="{{ request('product_name') }}" placeholder="Search products..">
        </div>

        <div class="d-flex align-items-center form-group">
            <button type="submit" class="btn btn-outline-dark">Submit</button>
        </div>
    </form>
</div>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-2">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @php
                $countdown = 0;
            @endphp
            @foreach ($product as $prod)
            @if ($prod->end_date < now())
                @continue
            @endif
            <a href="/detail-product/{{ $prod->product_id }}" class="col mb-5 no-text-decor">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top .img-thumbnail" src="{{ URL::asset($prod->product_image) }}" style="object-fit: cover; height:300px; width:100%;" alt="..."/>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="product top-bottom-card">
                            <!-- Product name-->
                            <div class="upper-card">
                                <h5 class="fw-bolder">{{ $prod->product_name }}</h5>
                                <h6 class="desctiption-text">{{ $prod->product_description }}</h6>
                            </div>
                        </div>
                    </div>

                    <!-- Product price-->
                    <div class="p-4 lower-card">
                        @if ($prod->highest_bid === $prod->starting_price || $prod->highest_bid < $prod->starting_price)
                            STARTING PRICE:
                            <p>USD {{ $prod->starting_price }}</p>
                        @else
                            HIGHEST BID:
                            <p>USD {{ $prod->highest_bid }}</p>
                        @endif
                        
                        <script>
                            CountDownTimer('{{ $prod->end_date }}','countdown-{{$countdown}}');
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

                        <div id="countdown-{{$countdown}}" class="countdown"></div>

                        @php
                            $countdown += 1;
                        @endphp
                    </div>
                </div>
            </a>

            

            @endforeach
        </div>
        <div class="mt-4 d-flex justify-content-center">
            {{ $product->links() }}
        </div>

    </div>
</section>
@endsection