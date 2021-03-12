<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function welcome(Request $request){
      return view('welcome');
    }

    public function products(Request $request){
      $products = Product::all();
      return view('product-page')->withProducts($products);
    }

}
