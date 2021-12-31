<?php

namespace App\Http\Controllers;

use App\Models\ActiveBid;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActiveBidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active_bid = collect(ActiveBid::all())->where('user_id', auth()->user()->user_id);
        
        $dt = Carbon::now();

        return view('active_bid.index', [
            'title'=> 'Le Blanc | Active Bid',
            'active_bid' => $active_bid,
            'dt_now' => $dt
        ]);
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
        if($request->session()){
            if((int)$request->bidInput <= (int)$request->highest_bid){
                return back()->with('bidError', 'Bid Price Invalid!');
            }
            
            $user_id = $request->user_id;
            $product_id = $request->product_id;
            $bid_price = $request->bidInput;

            if(ActiveBid::where('product_id', $product_id)->first() !== null){
                if(Product::where('product_id', $product_id)->first()->highest_bid < $bid_price){
                    $product = Product::where('product_id', $product_id)->first();
                    $last_highest_bidder = $product->highest_bidder_id;
                    
                    $change_bidder = ActiveBid::where('product_id', $product_id)->where('user_id', $last_highest_bidder)->first();
                    $change_bidder->status_bid = 0;

                    $bid = new ActiveBid();
                    $bid->bid_price = $bid_price;
                    $bid->product_id = $product_id;
                    $bid->user_id = $user_id;
                    $bid->status_bid = 1;

                    $product->highest_bid = $bid_price;
                    $product->highest_bidder_id = $user_id;

                    $change_bidder->save();
                    $bid->save();
                    $product->save();

                }
            }else{
            
                $new_bid = new ActiveBid();
                $new_bid->user_id = $user_id;
                $new_bid->product_id = $product_id;
                $new_bid->bid_price = $bid_price;
                $new_bid->status_bid = 1;
                $new_bid->save();

                $product = Product::where('product_id', $product_id)->first();
                $product->highest_bidder_id = $user_id;
                $product->highest_bid = $bid_price;
                $product->save();

            }
            
            return back()->with('addToCartSuccess', 'Bid Success!');

        }
    }

    public function store_transaction(Request $request){
        $active_bid = ActiveBid::where('bid_id', $request->bid_id)->first();

        $now = now()->toDate();
        $transaction = new Transaction();
        $transaction->user_id = auth()->user()->user_id;
        $transaction->item_name = $active_bid->products->product_name;
        $transaction->item_detail = $active_bid->products->product_description;
        $transaction->price = $active_bid->bid_price;
        $transaction->transaction_date = $now;
        $transaction->save();

        ActiveBid::where('bid_id', $request->bid_id)->first()->delete();
        return back()->with('checkoutSuccess', 'Payment Success!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
