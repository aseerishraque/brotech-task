<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('pages.categories', compact('categories'));
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
           'name' => 'required'
        ]);
        $obj = new Category();
        $obj->name = $request->name;
        if (isset($request->category_id))
            $obj->parent_id = $request->category_id;
        if ($obj->save())
            return redirect()->back()->with([
                'success' => 'Category Created Successfully!'
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
            'name' => 'required'
        ]);
        $obj = new Category();
        $obj = $obj->find($id);
        $obj->name = $request->name;
        if (isset($request->category_id))
            $obj->parent_id = $request->category_id;
        if ($obj->save())
            return redirect()->back()->with([
                'success' => 'Category Updated Successfully!'
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
        $obj = new Category();
        $obj = $obj->find($id);
        if ($obj->delete())
            return redirect()->back()->with([
                'success' => 'Category Deleted Successfully!'
            ]);
        else
            return redirect()->back()->with([
                'error' => 'Something went wrong!'
            ]);
    }
}
