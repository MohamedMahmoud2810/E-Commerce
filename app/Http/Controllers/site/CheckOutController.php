<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use App\Models\UserAddress;
use Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user() ? auth()->user()->id : null;
        $cartItems = Cart::session($userId)->getContent();
        $total = 0;

        $user = Auth::user();
        $userAddress = $user->userAddress;
        foreach ($cartItems as $item) {
            if ($item->associatedModel->quantity > $item['quantity']) {
                $total += $item['price'] * $item['quantity'];
                $item->associatedModel->quantity -= $item['quantity'];
                $item->associatedModel->save();
            }

            if(!Product::where('id' , $item->id)->where('id' , $item->id)->where('quantity' , '>=' , $item->quantity)->exists())
            {
                Cart::session($userId)->remove($item->id);
            }
        }
        return view('site.checkout.index' , compact('cartItems' , 'total' , 'userAddress'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function placeOrder(Request $request)
    {
    $userId = auth()->user() ? auth()->user()->id : null;
    $cartItems = Cart::session($userId)->getContent();
    $total = 0;


    foreach ($cartItems as $item) {
        $availableQuantity = $item->associatedModel->quantity;
        $quantityToBuy = $item['quantity'];
        $quantityToAdd = min($availableQuantity, $quantityToBuy);
        $total += $item['price'] * $quantityToAdd;

        if ($availableQuantity < $quantityToBuy) {
            Cart::session($userId)->remove($item->id);
        }
    }
    if ($total > 0) {
        $order = new Order();
        $order->name = $request->input('name');
        $order->surname = $request->input('surname');
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->country = $request->input('country');
        $order->potal_code = $request->input('potal_code');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->status = 0;
        $order->payment_method = 'cash';
        $order->payment_status = 'not collected';
        $order->payment_id = rand(11111111, 9999999999);
        $order->totlal_price = $total;
        $order->shipping_price = '50';
        $order->user_id = $userId;
        $order->save();
        $order->id;



        foreach($cartItems as $item) {

            OrderDetail::create([
                'order_id' => $order->id,
                'product_id'=> $item->associatedModel->id,
                'quantity' => $item['quantity'],
                'price' => $item->associatedModel->price,
            ]);

        }

        $user = Auth::user();
        $userAddress = $user->userAddress;

        if(!$userAddress) {
            $userAddress = new UserAddress();
            $userAddress->user_id = $userId;
            $userAddress->name = $request->input('surname');
            $userAddress->surname = $request->input('surname');
            $userAddress->address = $request->input('address');
            $userAddress->city = $request->input('city');
            $userAddress->state = $request->input('state');
            $userAddress->country = $request->input('country');
            $userAddress->postal_code = $request->input('potal_code');
            $userAddress->phone = $request->input('phone');
            $userAddress->email = $request->input('email');
            $userAddress->save();
        }

        Cart::session($userId)->clear();
    }
    return redirect()->route('index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
