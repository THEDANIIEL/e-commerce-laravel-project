<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;

class CartComponent extends Component
{

    public function increaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty +1;
        Cart::update($rowId, $qty);
        return redirect()->route('product.cart');
        
    }

    public function decreaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty -1;
        Cart::update($rowId, $qty);
        return redirect()->route('product.cart');
    }

    public function destroy($rowId){
        Cart::remove($rowId);
        session()->flash('success_message', 'Item has been remove');
        return redirect()->route('product.cart');
    }

    public function destroyAll(){
        Cart::destroy();
        return redirect()->route('product.cart');
    }

    public function render()
    {
        return view('livewire.cart-component')->layout("layouts.base");
    }
}
