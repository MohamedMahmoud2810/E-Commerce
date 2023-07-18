<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::orderBy('id' , 'desc')->get();
        $users = User::all();
        return view('site.index' , compact('products' , 'users'));
    }
}
