<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
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
        $categories = Category::all();
        $products = Product::join('categories', 'categories.id', 'products.category_id')
                            ->select('products.*', 'categories.name as category_name')
                            ->orderBy('id', 'desc')
                            ->get();
        return view('pages.products', compact('products', 'categories'));
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
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'details' => 'required',
        ]);
        $obj = new Product();
        $obj->name = $request->name;
        $obj->category_id = $request->category_id;
        $obj->price = $request->price;
        $obj->details = $request->details;
        if ($obj->save())
            return redirect()->back()->with([
                'success' => 'Product Created Successfully!'
            ]);
        else
            return redirect()->back()->with([
                'error' => 'Something went wrong!'
            ]);
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
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'details' => 'required',
        ]);
        $obj = new Product();
        $obj = $obj->find($id);
        $obj->name = $request->name;
        $obj->category_id = $request->category_id;
        $obj->price = $request->price;
        $obj->details = $request->details;
        if ($obj->save())
            return redirect()->back()->with([
                'success' => 'Product Updated Successfully!'
            ]);
        else
            return redirect()->back()->with([
                'error' => 'Something went wrong!'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = new Product();
        $obj = $obj->find($id);
        if ($obj->delete())
            return redirect()->back()->with([
                'success' => 'Product Deleted Successfully!'
            ]);
        else
            return redirect()->back()->with([
                'error' => 'Something went wrong!'
            ]);
    }
}
