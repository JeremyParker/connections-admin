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
        $this->categories = Category::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->search) . '%'])
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('livewire.category-list', ['categories' => $this->categories]);
    }
}
