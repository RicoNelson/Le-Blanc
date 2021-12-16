@extends('layouts.main')

@section('body')
    <div class="container mt-4">
        
        <h2>Transaction</h2>

        <div class="container mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Transaction Time</th>
                        <th scope="col">Detail Transaction</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($transaction->count() !== 0)
                        @foreach ($transaction as $transaction_item)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $transaction_item->created_at }}</td>
                                <td>
                                    <a href="/detail_transaction/{{ $transaction_item->transaction_id }}" class="btn btn-primary">Check Detail</a>
                                </td>
                            </tr>
                        @endforeach

                    @else
                        <th scope="row">You have no transaction yet...</th>
                        <td></td>
                        <td></td>
                    @endif
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection