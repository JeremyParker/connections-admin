<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Word;

class WordList extends Component
{
    public $words;
    public $search = '';
    public function render()
    {
        $this->words = Word::where('text', 'like', '%' . $this->search . '%')->orderBy('updated_at', 'desc')->get();
        return view('livewire.word-list', ['words' => $this->words]);
    }
}
