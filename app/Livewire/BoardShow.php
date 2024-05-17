<?php

namespace App\Livewire;

use App\Models\Board;
use Livewire\Attributes\Layout;
use Livewire\Component;

class BoardShow extends Component
{
    public Board $board;

    public function mount()
    {
        $this->authorize('show', $this->board);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.board-show', [
            'columns' => $this->board->columns,
        ]);
    }
}
