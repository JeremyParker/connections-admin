<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Word;

class WordList extends Component
{
    public $layout = 'components.layouts.app';
    public $words;
    public $search = '';
    public bool $isTopical;
    public function render()
    {
        $this->words = Word::whereRaw('LOWER(text) LIKE ?', ['%' . strtolower($this->search) . '%'])
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('livewire.word-list', ['words' => $this->words]);
    }
}
