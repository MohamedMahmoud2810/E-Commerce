<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartCounter extends Component
{
    protected $listeners = ['cart_updated' => 'render'];
    public function render()
    {
        $cart_counter = Cart::getContent()->count();
        return view('livewire.cart-counter' , compact('cart_counter'));
    }
}
