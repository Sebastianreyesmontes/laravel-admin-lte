<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $productos = Product::get()->toArray();
        // dd($productos);
        return view ('/')->with(compact('productos'));
    }
}
