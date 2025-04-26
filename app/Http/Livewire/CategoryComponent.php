<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Product;


class CategoryComponent extends Component
{

    use WithPagination;

    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');  
        session()->flash('success_message', 'Item added in cart');
        return redirect()->route('shop.cart');

    }

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name,$product_price)->associate('App\Models\Product');
    }

    public function render()
    {

        $category = Category::where('slug',$this->slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

        $products = Product::where('category_id', $category_id)->paginate(12);   
        

        $categories = Category::orderBy("name","ASC")->get();
        return view('livewire.category-component',['products'=>$products,'categories'=>$categories, 'category_name'=>$category_name]);
    }

}
