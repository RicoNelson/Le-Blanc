@extends('layouts.main')

@section('body')

@if (session()->has('checkoutSuccess'))
<div class="container d-flex justify-content-center mt-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('checkoutSuccess') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

    <div class="container mt-4">
        <h2>Active Bid: </h2>

        <div class="container mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Bid Price</th>
                        <th scope="col">Auction Countdown</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($active_bid->count() !== 0)
                        <?php
                            $countdown = 0;
                        ?>
                        @foreach ($active_bid as $ab)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $ab->products->product_name }}</td>
                                <td>USD {{ $ab->bid_price }},-</td>

                                <script>
                                    CountDownTimer('{{ $ab->products->end_date }}','countdown-{{$countdown}}');
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

                                @if ($ab->products->end_date < $dt_now && $ab->products->highest_bidder_id === auth()->user()->user_id)
                                    <td>Auction End</td>
                                    @if ($ab->status_bid === 1)
                                        <td>Congrats, you get the item, please make a payment</td>
                                        <td>
                                            <form action="/store-bid" method="POST">
                                                @csrf
                                                <input type="hidden" name="bid_id" value="{{ $ab->bid_id }}">
                                                <button type="submit" class="btn btn-outline-dark">Pay</button>
                                            </form>
                                        </td>
                                    @else
                                        <td>Sorry you didn't get the produt, please try again next time.</td>
                                        <td></td>
                                    @endif
                                @elseif($ab->products->end_date < $dt_now && $ab->products->highest_bidder_id !== auth()->user()->user_id)
                                    <td>Auction End</td>
                                    <td>Sorry you didn't get the produt, please try again next time.</td>
                                    <td></td>
                                @else
                                    <td id="countdown-{{ $countdown }}"></td>
                                    @if ($ab->status_bid === 1)
                                        <td>You have the potential to get this item</td>
                                    @else
                                        <td>Someone bid higher than you. Please make a new bid</td>
                                    @endif
                                @endif
                                
                            </tr>

                            <?php
                                $countdown += 1;
                            ?>

                            
                        @endforeach

                    @else
                        <th scope="row">You have no active bid...</th>
                        <td></td>
                        <td></td>
                    @endif
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection