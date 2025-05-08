<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CartIconComponent extends Component
{

    protected $listeners = ['refreshComponent' => '$refresh'];
    public function render()
    {
        $categories = Category::orderBy("name","ASC")->get();
        return view('livewire.cart-icon-component', [
            'categories' => $categories,
        ]);
    }
}
