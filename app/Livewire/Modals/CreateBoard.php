<?php

namespace App\Livewire\Modals;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateBoard extends ModalComponent
{
    public \App\Livewire\Forms\CreateBoard $createBoardForm;

    public function createBoard()
    {
        $this->createBoardForm->validate();

        $board = auth()->user()->boards()->create($this->createBoardForm->only('title'));

        return redirect()->route('boards.show', $board);
    }

    public function render()
    {
        return view('livewire.modals.create-board');
    }
}
