<?php

namespace App\Http\Livewire;

use App\Models\Word;
use Livewire\Component;
use Livewire\Attributes\On;

/**
 * Component that shows the list of categories so the user can choose which category to add the word to
 */
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
        return view('livewire.add-word-to-category', ['word' => $word]);
    }

    #[On('categorySelected')]
    public function categorySelected($categoryId)
    {
        return redirect()->to(route('category_word.create', [
            'category' => $categoryId,
            'word' => $this->word->id,
            'returnTo' => 'word',
        ]));
    }
}
