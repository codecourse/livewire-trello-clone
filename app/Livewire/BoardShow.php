<?php

namespace App\Livewire;

use App\Models\Board;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Layout;
use Livewire\Component;

class BoardShow extends Component
{
    public Board $board;

    public function mount()
    {
        $this->authorize('show', $this->board);
    }

    public function sorted(array $items)
    {
        $order = collect($items)->pluck('value')->toArray();

        \App\Models\Column::setNewOrder($order, 1, 'id', function (Builder $query) {
            $query->where('user_id', auth()->id());
        });
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.board-show', [
            'columns' => $this->board->columns()->ordered()->get(),
        ]);
    }
}
