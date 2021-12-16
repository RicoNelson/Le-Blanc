<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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

    public function insertProductIndex(){
        return view('product.insert', [
            'title' =>  'Le Blanc | Insert New Product',
            'category' => Category::all()
        ]);
    }

    public function store(Request $request)
    {

        $validated_data = $request->validate([
            'category_id' => 'required',
            'product_name' => 'required|min:5|max:25',
            'product_description' => 'required|min:10|max:100',
            'price' => 'required|numeric|between:1000,10000000',
            'stock' => 'required|min:1|numeric',
            'product_image' => 'image|file'
        ]);

        $validated_data['product_image'] = 'storage/' . $request->file('product_image')->store('images/product');

        Product::create($validated_data);

        return back()->with('insertSuccess', 'Insert Product Success!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('product.index', [
            'product' => $product,
            'title' => 'Le Blanc | ' 
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
