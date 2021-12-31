<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DetailTransaction;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = Cart::where('user_id', $request->id)->get();
        
        $now = now()->toDate();
        $transaction = new Transaction();
        $transaction->user_id = $request->id;
        $transaction->transaction_date = $now;
        $transaction->save();


        foreach($cart as $key => $cart_item){
            $detail_transaction = new DetailTransaction();
            $detail_transaction->transaction_id = $transaction->transaction_id;
            $detail_transaction->item_name = $cart_item->products->product_name;
            $detail_transaction->item_detail = $cart_item->products->product_description;
            $detail_transaction->price = $cart_item->products->price;
            $detail_transaction->save();

            $product = Product::where('product_id', $cart_item->products->product_id);
        }

        Cart::where('user_id', $request->id)->delete();
        return back()->with('checkoutSuccess', 'Checkout Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $transaction = Transaction::where('user_id', auth()->user()->user_id)->get();

        // dd($transaction->crated_at);

        return view('transaction.index', [
            'transaction' => $transaction,
            'title' => 'Le Blanc | Transaction History'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
