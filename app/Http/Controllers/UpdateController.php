<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
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

    public function updateProfileIndex($id){

        return view('profile.update',[
            'title' => 'Le Blanc | update',
            'user' => User::where('user_id', $id)->first()
        ]);
    }

    public function updateProfileStore(Request $request, $id){

        $validated_data = $request->validate([
            'name' => 'required|max:30',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required|in:male,female'
        ]);

        $validated_data['password'] = bcrypt($validated_data['password']);

        $user = User::where('user_id', $id)->first();


        $user['name'] = $validated_data['name'];
        $user['password'] = $validated_data['password'];
        $user['gender'] = $validated_data['gender'];
        $user->save();

        return back()->with('updateProfileSuccess', 'Your Profile Updated!');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'category' => 'required',
            'title' => 'required|min:5|max:25',
            'description' => 'required|min:10|max:100',
            'price' => 'required|numeric|between:1000,10000000',
            'stock' => 'required|min:1|numeric'
        ]);

        if($request->hasFile('image')){
            $request->validate([
                'image' => 'image|file'
            ]);
        }

        $product = Product::where('product_id', $request['id'])->first();

        $product['category_id'] = $request['category'];
        $product['product_name'] = $request['title'];
        $product['product_description'] = $request['description'];
        $product['price'] = $request['price'];
        $product['stock'] = $request['stock'];
        
        if($request->file('image')){
            $product['product_image'] = 'storage/' . $request->file('image')->store('images/product');
        }

        $product->save();

        return back()->with('updateSuccess', 'Update Success!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('product_id', $id)->first();

        return view('product.update', [
            'title' => 'Le Blanc | Update',
            'category' => Category::all(),
            'product' => $product
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
