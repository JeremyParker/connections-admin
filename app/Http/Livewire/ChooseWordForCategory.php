<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\On;

/**
 * Component that shows the list of words so the user can choose one to add to a category
 */
class ChooseWordForCategory extends Component
{
    public $layout = 'components.layouts.app';
    public Category $category;

    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function render(Category $category)
    {
        return view('livewire.choose-word-for-category', ['category' => $category]);
    }

    #[On('wordSelected')]
    public function wordSelected($wordId)
    {
        return redirect()->to(route('category_word.create', [
            'category' => $this->category->id,
            'word' => $wordId,
            'returnTo' => 'category',
        ]));
    }
}
