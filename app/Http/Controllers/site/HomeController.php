<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {


//        Cart::session($userId)->clear();


//        dd($cart);
//        $add_to_cart = [];
//
//        // Add the product to cart
//        foreach ($products as $product) {
//            $add_to_cart[] = [
//                'id' => $product->id,
//                'name' => $product->name,
//                'price' => $product->price,
//                'quantity' => $product->quantity,
//                'attributes' => [],
//                'associatedModel' => $product,
//            ];
//        }

//        if( Cart::session($userId)->isEmpty()){
//            echo 'cart is empty<br>';
//        }
//        Cart::session($userId)->add($add_to_cart);
//
//        Cart::session($userId)->update($products[0]->id, array(
//            'name' => 'New Item Name', // new item name
//            'price' => 98.67, // new item price, price can also be a string format like so: '98.67'
//        ));
//        if( !Cart::session($userId)->isEmpty()){
//            echo 'cart is not empty<br>';
//        }
//        $total = Cart::session($user->id)->getTotal();

//        $cartTotalQuantity = Cart::session($user->id)->getTotalQuantity();
//        dd($cart , $total,$cartTotalQuantity);


//        $items = Cart::session($user->id)->getContent()->toArray();
//        dd($add_to_cart,$total,$cartTotalQuantity,$items);
        return view('site.index');
    }




}
