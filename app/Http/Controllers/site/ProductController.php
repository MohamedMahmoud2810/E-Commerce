<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id){
        $product = Product::with('images' , 'category')->find($id);
        return view('site.product.show' , compact('product'));
    }
}
