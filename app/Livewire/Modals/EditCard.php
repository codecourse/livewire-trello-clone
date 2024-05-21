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
        $this->editCardForm->fill($this->card->only('title', 'notes'));
    }

    public function archiveCard()
    {
        $this->authorize('archive', $this->card);

        $this->card->update([
            'archived_at' => now()
        ]);

        $this->dispatch('column-' . $this->card->column->id . '-updated');
        $this->dispatch('closeModal');
    }

    public function updateCard()
    {
        $this->authorize('update', $this->card);

        $this->editCardForm->validate();

        $this->card->update($this->editCardForm->only('title', 'notes'));

        $this->dispatch('card-' . $this->card->id . '-updated');
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.modals.edit-card');
    }
}
