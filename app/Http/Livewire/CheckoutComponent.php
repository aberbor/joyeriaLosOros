<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CheckoutComponent extends Component
{
    public function render()
    {
        $categories = Category::orderBy("name","ASC")->get();
        return view('livewire.checkout-component', [
            'categories' => $categories,
        ]);
    }
}
