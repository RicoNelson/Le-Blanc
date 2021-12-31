<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
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

        if($request->session()){
            if((int)$request->bidInput < (int)$request->highest_bid){
                return back()->with('bidError', 'Bid Price Invalid!');
            }
            
            $user_id = $request->user_id;
            $product_id = $request->product_id;
            
            if(Cart::where('product_id', $product_id)->where('user_id', $user_id)->first() !== null){
                $cart = Cart::where('product_id', $product_id)->where('user_id', $user_id);
            }else{
                $cart = new Cart();
                $cart->user_id = $user_id;
                $cart->product_id = $product_id;
                $cart->save();
            }
            return back()->with('addToCartSuccess', 'Add To Cart Success!');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cart = collect(Cart::all())->where('user_id', auth()->user()->user_id);

        return view('cart.index', [
            'id' => auth()->user()->user_id,
            'cart' => $cart,
            'title' => 'Le Blanc | Cart',
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
    public function destroy(Request $request)
    {
        Cart::where('cart_id', $request['cart_id'])->delete();
        return back()->with('deleteSuccess', 'The Item Deleted');
    }
}
