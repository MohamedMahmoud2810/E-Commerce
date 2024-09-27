<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request){
//        $product = Product::findOrFail($request->input('id'));
//        $user = User::first();
//        Auth::setUser($user);
//        $user = Auth::user();
//        $userId = $user->id;
//        Cart::session($userId)->add(
//            $product->id ,
//            $product->name ,
//            $product->price,
//            $request->input('quantity'),
//            );
//        return redirect()->route('index')->with('message' , 'Successfully Added to cart');
    }

    public function show(){
        $userId = auth()->user() ? auth()->user()->id : null;
        $cartItems = $userId ? Cart::session($userId)->getContent() : null;
        $total = 0;
        foreach ($cartItems as $item) {
            if ($item->associatedModel->quantity > 0) {
                $total += $item['price'] * $item['quantity'];            }
        }



        return view('site.showCart' , compact('cartItems' , 'total'));
    }

    public function deleteItem($id){
        $userId = auth()->user() ? auth()->user()->id : null;
        Cart::session($userId)->remove($id);
        return redirect()->route('cart.show')->with('item is deleted successfully');
    }

    public function update($id, Request $request)
    {
        $userId = auth()->user() ? auth()->user()->id : null;
        $cartItem = Cart::session($userId)->get($id);


        if ($cartItem) {
            $newQuantity = $request->input('quantity');
            if ($newQuantity <= 0) {
                Cart::session($userId)->remove($id);
            } else {
                Cart::session($userId)->update($id, [
                    'quantity' => array(
                        'relative' => false,
                        'value' => $newQuantity
                    ),
                ]);
            }

            $total = 0;
            foreach (Cart::session($userId)->getContent() as $item) {
                $total += $cartItem->associatedModel->price * $newQuantity;
            }



            // Use 'success' as the key to display a success message in the view
            return redirect()->route('cart.show')->with('success', 'Item quantity updated successfully.')
                ->with('total' , $total);
        }else{
            // Handle the case when the cart item is not found or any other error
            return redirect()->route('cart.show')->with('error', 'Item not found or an error occurred.');
        }


    }
}
