<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::join('categories', 'categories.id', 'products.category_id')
            ->select('products.*', 'categories.name as category_name')
            ->orderBy('id', 'desc')
            ->paginate(6);
        return view('pages.index', compact('products'));
    }

    public function getProducts($category_id)
    {
        $category_name = Category::where('id', $category_id)->first()->name;
        $products = Product::join('categories', 'categories.id', 'products.category_id')
            ->select('products.*', 'categories.name as category_name')
            ->where('products.category_id', $category_id)
            ->orderBy('id', 'desc')
            ->paginate(6);
        return view('pages.index', compact('products', 'category_name'));
    }
}
