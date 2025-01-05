<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Categories extends Component
{
    public $layout = 'components.layouts.app';

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.categories');
    }

    #[On('categorySelected')]
    public function categorySelected($categoryId)
    {
        return redirect()->to(route('showEditCategory', ['category' => $categoryId]));
    }
}
