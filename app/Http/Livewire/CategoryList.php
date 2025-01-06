<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryList extends Component
{
    public $layout = 'components.layouts.app';

    public $search = '';

    public function render()
    {
        $categories = Category::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->search) . '%'])
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('livewire.category-list', ['categories' => $categories]);
    }

    public function onSelected($categoryId)
    {
        $this->dispatch('categorySelected', categoryId: $categoryId);
    }
}
