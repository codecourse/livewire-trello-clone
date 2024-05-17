<?php

namespace App\Livewire;

use Livewire\Component;

class Card extends Component
{
    public \App\Models\Card $card;

    protected $listeners = [
        'card-{card.id}-updated' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.card');
    }
}
