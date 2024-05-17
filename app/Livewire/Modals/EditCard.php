<?php

namespace App\Livewire\Modals;

use App\Models\Card;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditCard extends ModalComponent
{
    public Card $card;

    public function render()
    {
        return view('livewire.modals.edit-card');
    }
}
