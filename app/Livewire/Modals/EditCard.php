<?php

namespace App\Livewire\Modals;

use App\Models\Card;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditCard extends ModalComponent
{
    public Card $card;

    public \App\Livewire\Forms\EditCard $editCardForm;

    public function mount()
    {
        $this->editCardForm->fill($this->card->only('title'));
    }

    public function updateCard()
    {
        $this->editCardForm->validate();

        $this->card->update($this->editCardForm->only('title'));

        $this->dispatch('card-' . $this->card->id . '-updated');
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.modals.edit-card');
    }
}
