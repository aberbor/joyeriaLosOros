<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;


class ShopComponent extends Component
{

    use WithPagination;

    public $min_price = 0;
    public $max_price = 100000;

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');  
        session()->flash('success_message', 'Item added in cart');
        $this->emiteTo('cart-icon-component','refreshComponent');
        return redirect()->route('shop.cart');

    }

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wish-list-icon-component', 'refreshComponent');
    }

    public function removeFromWishlist($product_id)
    {
        foreach(Cart:: instance('wishlist')->content() as $witem)
        {
            if($witem->id==$product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wish-list-icon-component', 'refreshComponent');
                return;
            }
        }
    }


    public function render()
    {
        $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate(12);   
        

        $categories = Category::orderBy("name","ASC")->get();
        return view('livewire.shop-component',['products'=>$products,'categories'=>$categories]);
    }

}
