<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // index
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }
    // show
    public function show(Product $product)
    {
        return view('product.order', compact('product'));
    }
}
