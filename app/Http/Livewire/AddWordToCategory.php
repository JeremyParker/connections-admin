<?php

namespace App\Http\Livewire;

use App\Models\Word;
use Livewire\Component;
use Livewire\Attributes\On;

class AddWordToCategory extends Component
{
    public $layout = 'components.layouts.app';
    public Word $word;

    public function mount(Word $word)
    {
        $this->word = $word;
    }

    public function render(Word $word)
    {
        $listeners = $this->getListeners();
        return view('livewire.add-word-to-category', ['word' => $word]);
    }

    #[On('categorySelected')]
    public function categorySelected($categoryId)
    {
        $listeners = $this->getListeners();
        return redirect()->to(route('showEditCategory', ['category' => $categoryId]));
        // return redirect()->to(route('showEditCategory', ['category' => $categoryId]));
    }
}
