<?php

namespace App\Livewire;

use Livewire\Component;

class Card extends Component
{
    public \App\Models\Card $card;

    public function render()
    {
        return view('livewire.card');
    }
}
