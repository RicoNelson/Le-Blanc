@extends('layouts.main')

@section('body')
<div class="container mt-4">
        
    <h2>Transaction Detail</h2>

    <div class="container mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Detail</th>
                    <th scope="col">Price</th>
                    {{-- <th scope="col">Quantity</th> --}}
                    <th scope="col">Sub Total</th>
                </tr>
            </thead>
            <tbody>
                @if ($detail_transaction->count() !== 0)
                    @php
                        $grand_total = 0;
                    @endphp
                    @foreach ($detail_transaction as $detail_transaction_item)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $detail_transaction_item->item_name }}</td>
                            <td>{{ $detail_transaction_item->item_detail }}</td>
                            <td>Rp. {{ $detail_transaction_item->price }},-</td>
                            {{-- <td>{{ $detail_transaction_item->quantity }}</td>
                            <td>Rp. {{ $detail_transaction_item->quantity * $detail_transaction_item->price }},-</td> --}}
                            @php
                                $grand_total += ($detail_transaction_item->price);
                            @endphp
                        </tr>
                    @endforeach



                @else
                    <th scope="row">You have no transaction yet...</th>
                    <td></td>
                    <td></td>
                @endif
                
            </tbody>
        </table>
            @if ($detail_transaction->count() !== 0)
                <div class="d-flex justify-content-end">
                    <p>Grand Total: Rp. {{ $grand_total }},-</p>
                </div>
            @endif
    </div>
</div>
@endsection