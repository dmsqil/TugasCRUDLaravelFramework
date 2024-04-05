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
        return view('welcome', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Response
    {
        return response(view('produk.create'));
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

        return redirect(route('index'))->with('error', 'Failed to add product!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id): Response
    {
        $product = Product::findOrFail($id);
        return response(view('produk.edit', ['product' => $product]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        if ($product->update($request->validated())) {
            return redirect(route('index'))->with('success', 'Updated!'); 
        }

        return redirect(route('index'))->with('error', 'Failed to update product!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        if ($product->delete()) {
            return redirect(route('index'))->with('success', 'Deleted!');
        }

        return redirect(route('index'))->with('error', 'Sorry, unable to delete this product!');
    }
}
