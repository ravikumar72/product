<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class HomeController extends Controller
{
   function listProduct()
    {
        $products=Product::get();
        return view('home.index', compact('products'));
    }
}
