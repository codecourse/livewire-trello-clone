<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateColumn;
use App\Models\Board;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Layout;
use Livewire\Component;

class BoardShow extends Component
{
    public Board $board;

    public CreateColumn $createColumnForm;

    protected $listeners = [
        'board-updated' => '$refresh'
    ];

    public function mount()
    {
        $this->authorize('show', $this->board);
    }

    public function sorted(array $items)
    {
        $order = collect($items)->pluck('value')->toArray();

        \App\Models\Column::setNewOrder($order, 1, 'id', function (Builder $query) {
            $query->whereBelongsTo(auth()->user());
        });
    }

    public function moved(array $items)
    {
        collect($items)->recursive()->each(function ($column) {
            $columnId = $column->get('value');
            $order = $column->get('items')->pluck('value')->toArray();

            \App\Models\Card::where('user_id', auth()->id())
                ->find($order)
                ->where('column_id', '!=', $columnId)
                ->each->update([
                    'column_id' => $columnId
                ]);

            \App\Models\Card::setNewOrder($order, 1, 'id', function (Builder $query) {
                $query->where('user_id', auth()->id());
            });
        });
    }

    public function createColumn()
    {
        $this->authorize('createColumn', $this->board);

        $this->createColumnForm->validate();

        $column = $this->board->columns()->make($this->createColumnForm->only('title'));
        $column->user()->associate(auth()->user());

        $column->save();

        $this->createColumnForm->reset();

        $this->dispatch('column-created');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.board-show', [
            'columns' => $this->board->columns()->ordered()->notArchived()->get(),
        ]);
    }
}
