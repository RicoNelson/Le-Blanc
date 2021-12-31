@extends('layouts.main')

@section('body')
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
                    </tr>
                </thead>
                <tbody>
                    @if ($active_bid->count() !== 0)
                        <?php
                            $total = 0;
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

                                <td id="countdown-{{ $countdown }}"></td>

                                @if ($ab->status_bid === 1)
                                    <td>You have the potential to get this item</td>
                                @else
                                    <td>Someone bid higher than you. Please make a new bid</td>
                                @endif
                            </tr>

                            <?php
                                $total += $ab->products->price;
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
            
            {{-- @if ($active_bid>count() !== 0)
                <div class="d-flex flex-column align-items-end">
                    <p>Grand Total: Rp. {{ $total }},-</p>
                    <form action="/transaction-create" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ auth()->user()->user_id }}">
                        <button class="btn btn-primary">Checkout</button>
                    </form>
                </div>
            @endif --}}
        </div>
    </div>
@endsection