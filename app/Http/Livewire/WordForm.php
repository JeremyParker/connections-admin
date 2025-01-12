<?php

namespace App\Http\Livewire;

use App\Models\Word;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Collection;

class WordForm extends Component
{
    public $layout = 'components.layouts.app';
    public Word $word;
    public String $text;
    public bool $isTopical;
    public Collection $categories;

    public function mount(Word $word)
    {
        $this->word = $word->load('categories'); // Eager load the categories relationship
        $this->categories = $this->word->categories;
        $this->fill($word->only('text', 'isTopical'));
    }

    public function render()
    {
        return view('livewire.word-form');
    }

    public function saveWord()
    {
        Log::info("saving " . $this->text);
        $this->validate([
            'text' => 'required|min:3',
        ]);
        $this->word->text = $this->text;
        $this->word->isTopical = $this->isTopical;
        $this->word->save();
        return redirect()->route('words.index');
    }
}
