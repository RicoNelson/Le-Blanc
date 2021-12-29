@extends('layouts.main')

@section('body')
<div class="album py-5">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @foreach ($product as $prod)
                <div class="col">
                    <div class="card shadow-sm">
                        <a href="/detail-product/{{ $prod->product_id }}" class="for-image d-flex justify-content-center align-item-center" style="position: relative; height: 300px; overflow: hidden;">
                            <img src="{{ URL::asset($prod->product_image) }}" alt="" class="bd-placeholder-img card-img-top" style="position: absolute; top: -9999px; left: -9999px; right: -9999px; bottom: -9999px; margin: auto; height:300px; width:auto;">
                        </a>
                        
                        <div class="card-body">
                            <a href="/detail-product/{{ $prod->product_id }}" style="text-decoration: none; color:black">
                                <h3> {{ $prod->product_name }} </h3>
                            </a>
                            <p class="card-text">{{ $prod->product_description }}</p>
                            
                            <div class="d-grid gap-2">
                                @auth
                                    @if (auth()->user()->role_id === 1)
                                        <a href="/update/{{ $prod->product_id }}" class="btn btn-danger">Update Product</a>
                                    @endif
                                @endauth
                                <a href="/detail-product/{{ $prod->product_id }}" class="btn btn-primary">Product Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            
            @endforeach
            
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $product->links() }}
        </div>
    </div>
</div>
@endsection