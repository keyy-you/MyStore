<?php

namespace App\Http\Controllers;

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
      $product = Product::paginate(5);
      return view('product', compact('product'));
    }

    public function showProduct($slug)
    {
      $product = Product::where('product_slug', $slug)
              ->firstOrFail();
      return view('product', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('layouts.createProduct');
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
      return view("product.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      $product->delete();

      return redirect('/product');
    }
    public function simpan(Request $request, Product $product)
    {
      $product = new Product;
      $product->product_title = $request->product_title;
      $product->product_price = $request->product_price;
      $product->product_slug = \Str::slug($request->product_title);
      $product->product_image = $request->product_image;
      if(Product::where('product_slug', $product->product_slug)->exists()){
        return redirect('/product/create')->with('error', 'Product udah ada gan!');
      } else {
        $product->save();
        return redirect('/product');
      }
    }

    public function edit(Product $product)
    {
      $data = $product;
      return view('product.edit', compact('data'));

    }

    public function update(Request $request)
    {
      $product = $request->all();
      unset($product['_token']);
      unset($product['_method']);
      Product::where('id', $request->id)->update($product);
      // dd($request->all());
      return redirect('/product');
    }

}

