<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Words extends Component
{
    public $layout = 'components.layouts.app';

    public function render()
    {
        return view('livewire.words');
    }

    #[On('wordSelected')]
    public function wordSelected($wordId)
    {
        return redirect()->to(route('word.edit', ['word' => $wordId]));
    }
}
