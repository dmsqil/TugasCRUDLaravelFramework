<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  public function index()
  {
      $products = Product::all();
      return view('products.index', ['products' => $products]);
  }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Response
    {
        return response(view('products.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
      if (Product::create($request->validated())) {
          return redirect(route('index'))->with('success', 'Added!');
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id): Response
    {
        $product = Product::findOrFail($id);
        return response(view('products.edit', ['product' => $product]));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function update(UpdateProductRequest $request, string $id):       RedirectResponse
    {
      $product = Product::findOrFail($id);

      if ($product->update($request->validated())) {
          return redirect(route('index'))->with('success', 'Updated!'); 
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function destroy(string $id): RedirectResponse
  {
      $product = Product::findOrFail($id);

      if ($product->delete()) {
          return redirect(route('products.index'))->with('success', 'Deleted!');
      }

      return redirect(route('products.index'))->with('error', 'Sorry, unable to delete this!');
  }

}