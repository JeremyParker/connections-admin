<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryList extends Component
{
    public $categories;
    public $search = '';

    public function render()
    {
        $this->categories = Category::where('name', 'like', '%' . $this->search . '%')->get();
        return view('livewire.category-list', ['categories' => $this->categories]);
    }
}
