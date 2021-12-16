@extends('layouts.main')

@section('body')

    @if (session()->has('deleteSuccess'))
    <div class="container d-flex justify-content-center mt-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('deleteSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    @if (session()->has('checkoutSuccess'))
    <div class="container d-flex justify-content-center mt-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('checkoutSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <div class="container mt-4">
        <h2>Cart: </h2>

        <div class="container mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Sub Total</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($cart->count() !== 0)
                        <?php
                            $total = 0;
                        ?>
                        @foreach ($cart as $cart_item)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $cart_item->products->product_name }}</td>
                                <td>Rp. {{ $cart_item->products->price }},-</td>
                                <td>{{ $cart_item->quantity }}</td>
                                <td>Rp. {{ $cart_item->quantity * $cart_item->products->price }},-</td>
                                <td>
                                    <form action="/cart" method="POST">
                                        @csrf
                                        <input type="hidden" name="cart_id" value="{{ $cart_item->cart_id }}">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <?php
                                $total += $cart_item->quantity * $cart_item->products->price;
                            ?>
                            
                        @endforeach

                    @else
                        <th scope="row">You have nothing in cart...</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    @endif
                    
                </tbody>
            </table>
            
            @if ($cart->count() !== 0)
                <div class="d-flex flex-column align-items-end">
                    <p>Grand Total: Rp. {{ $total }},-</p>
                    <form action="/transaction-create" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ auth()->user()->user_id }}">
                        <button class="btn btn-primary">Checkout</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection