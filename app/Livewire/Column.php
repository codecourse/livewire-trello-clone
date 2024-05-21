<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateCard;
use App\Livewire\Forms\EditColumn;
use Livewire\Component;

class Column extends Component
{
    public \App\Models\Column $column;

    public EditColumn $editColumnForm;

    public CreateCard $createCardForm;

    protected $listeners = [
        'column-{column.id}-updated' => '$refresh'
    ];

    public function mount()
    {
        $this->editColumnForm->title = $this->column->title;
    }

    public function archiveColumn()
    {
        $this->authorize('archive', $this->column);

        $this->column->update([
            'archived_at' => now()
        ]);

        $this->dispatch('board-updated');
    }

    public function updateColumn()
    {
        $this->authorize('update', $this->column);

        $this->editColumnForm->validate();

        $this->column->update($this->editColumnForm->only('title'));

        $this->dispatch('column-updated');
    }

    public function createCard()
    {
        $this->authorize('createCard', $this->column);

        $this->createCardForm->validate();

        $card = $this->column->cards()->make($this->createCardForm->only('title'));
        $card->user()->associate(auth()->user());

        $card->save();

        $this->createCardForm->reset();

        $this->dispatch('card-created');
    }

    public function render()
    {
        return view('livewire.column', [
            'cards' => $this->column->cards()->ordered()->notArchived()->get(),
        ]);
    }
}
