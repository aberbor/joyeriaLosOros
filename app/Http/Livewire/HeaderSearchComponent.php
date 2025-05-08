<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class HeaderSearchComponent extends Component
{
    public $q;

    public function mount()
    {
        $this->fill(request()->only('q'));
    }
    
    public function render()
    {
        $categories = Category::orderBy("name","ASC")->get();
        return view('livewire.header-search-component', [
            'categories' => $categories,
        ])->layout('layouts.base');
    }
}
