<?php

namespace App\Http\Livewire;

use App\Models\Word;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class WordForm extends Component
{
    public $layout = 'components.layouts.app';
    public Word $word;
    public String $text;
    public bool $isTopical;

    public function mount(Word $word)
    {
        Log::info($word);
        $this->word = $word;
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
