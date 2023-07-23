<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;

class ProductsView extends Component
{
    public $products;
    public array $quantity = [];
    public $user;

    public function mount(){
        $this->products = Product::orderBy('id', 'asc')->get();
        $this->user = auth()->user();
        foreach ($this->products as $product){
            $this->quantity[$product->id] = 1;
        }
    }

    public function render()
    {

        $userId = $this->user ? $this->user->id : null;
//        Cart::session($userId)->clear();
        $cart = $userId ? Cart::session($userId)->getContent() : null;
        return view('livewire.products-view' , compact('cart'));
    }

    public function addToCart($id){
        $product = Product::findOrFail($id);
        $userId = $this->user ? $this->user->id : null;
        $quantity = $this->quantity[$product->id] ?? 1;
        $price = $product->price * $quantity;
        if($userId){
            $cart = Cart::session($userId)->add([
                    'id' =>$product->id ,
                    'name' =>$product->name ,
                    'price' =>$price,
                    'quantity'=>$quantity,
                    'image' =>$product->image,
                    'associatedModel' => $product,
            ]);

        $this->emit('cart_updated');
        return redirect()->route('index')->with('message' , 'Successfully Added to cart');
        }else{
            return redirect()->route('login')->with('message' , 'You Are Not Authenticated Please Login');
        }
    }
}
