<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use App\Models\Category;

class CartComponent extends Component
{

    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function destroy($id)
    {
        Cart::instance('cart')->remove($id);
        session()->flash('success_message', 'Item removed from cart');
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function clearAll()
    {
        Cart::instance('cart')->destroy();
        session()->flash('success_message', 'All items removed from cart');
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function render()
    {
        $categories = Category::orderBy("name","ASC")->get();
        return view('livewire.cart-component', [
            'categories' => $categories,
        ]);
    }
}
