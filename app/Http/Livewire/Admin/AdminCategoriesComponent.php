<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;


class AdminCategoriesComponent extends Component
{
    use WithPagination;

    public $category_id;

    public function deleteCategory($category_id)
    {
        $category = Category::find($category_id);
        if ($category) {
            $category->delete();
            session()->flash('message', 'Category has been deleted successfully!');
        } else {
            session()->flash('error', 'Category not found!');
        }
    }
    public function render()
    {
        $categories = Category::orderBy('name','ASC')->paginate(10);
        return view('livewire.admin.admin-categories-component', ['categories'=>$categories]);
    }
}
