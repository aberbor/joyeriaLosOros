<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use App\Models\Category;

class WishlistComponent extends Component
{

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
        $categories = Category::orderBy("name","ASC")->get();
        return view('livewire.wishlist-component', [
            'categories' => $categories,
        ]);
    }
}
