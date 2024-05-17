<?php

namespace App\Livewire\Modals;

use App\Models\Board;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CardArchive extends ModalComponent
{
    public Board $board;

    public function unarchiveCard($id)
    {
        $card = $this->board->cards->find($id);

        $card->update([
            'archived_at' => null
        ]);

        $this->dispatch('column-' . $card->column->id . '-updated');
    }

    public function render()
    {
        return view('livewire.modals.card-archive', [
            // @todo order by when archived
            'cards' => $this->board->cards()->archived()->latestArchived()->get()
        ]);
    }
}
