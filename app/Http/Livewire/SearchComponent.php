<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;


class SearchComponent extends Component
{

    use WithPagination;

    public $q;
    public $search_term;

    public function mount($q = null)
    {
        $this->fill(request()->only('q'));
        $this->search_term = '%'.$this->q.'%';
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');  
        session()->flash('success_message', 'Item added in cart');
        $this->emiteTo('cart-icon-component', 'refreshComponent');
        return redirect()->route('shop.cart');

    }

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name, 1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-icon-component', 'refreshComponent');
    }


    public function render()
    {
        $products = Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->where('name', 'like',$this->search_term)->paginate(12);   
        

        $categories = Category::orderBy("name","ASC")->get();
        return view('livewire.search-component',['products'=>$products,'categories'=>$categories]);
    }

}
