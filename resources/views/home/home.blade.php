@extends('layouts.main')

@section('body')

<div class="d-flex mt-4 featured-product">
    <div class="featured-auction-text">
        <h5>Featured Product</h5>
        <h1 style="font-weight: bold; font-size: 50px">Oddly Cloudy</h1>
        <div class="flex-row-auction mt-2">
            <img src="https://img.icons8.com/material-outlined/24/000000/calendar.png"/>
            <h6 class="add-margin-left font-size-15">Dec 29th, 2022 07:45 PM</h6>
        </div>
        
        <div class="flex-row-auction mb-3">
            <img src="https://img.icons8.com/external-those-icons-lineal-those-icons/24/000000/external-dollar-money-currency-those-icons-lineal-those-icons-5.png"/>
            <h6 class="add-margin-left font-size-17">Start from USD 9.000</h6>
        </div>
        <button class="height-button"><a href="#" style="width: 50px; text-decoration:none; color:black">Bid</button></a>
    </div>

    <div class="image">
        <img src="{{ URL::asset('images/product/featured product.jpg') }}" alt="">
    </div>

    
</div>


<div class="p-5 mb-4 border border-4 mt-5">
    <div class="container-fluid py-5 text-end">
        <h1 class="display-5 fw-bold">Le Blanc</h1>
        <p class="fs-4 text-end">Featuring a growing collection of luxury collectible artworks from some of the art industry’s contemporary heavyweights, Le Blanc was founded to prove that people don’t need to wade through an opaque antiquated art market and pay large commissions to buy great art.</p>
        <button class="height-button" type="button">Take A Look</button>
    </div>
</div>

<div class="text-center" style="margin-top: 40px">
    <h1 style="font-weight: bold">Maybe You Like This</h1>
</div>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-2">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($product as $prod)
            <div class="col mb-5">
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
                        HIGHEST BID:
                        <p>USD {{ $prod->starting_price }}</p>
                    </div>
                    <!-- Product actions-->
                    {{-- <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            @auth
                                @if (auth()->user()->role_id === 1)
                                    <div class="text-center"><a href="/update/{{ $prod->product_id }}" class="style-button">Update Product</a></div>
                                @endif
                            @endauth
                        {{-- <div class="text-center"><a class="style-button" href="/detail-product/{{ $prod->product_id }}">Product Detail</a></div> --}}
                    {{-- </div> --}} 
                </div>
            </div>
            @endforeach
    </div>

    </div>
</section>

<!-- /END THE FEATURETTES -->

@endsection