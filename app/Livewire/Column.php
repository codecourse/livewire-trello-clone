<?php

namespace App\Livewire;

use App\Livewire\Forms\EditColumn;
use Livewire\Component;

class Column extends Component
{
    public \App\Models\Column $column;

    public EditColumn $editColumnForm;

    public function mount()
    {
        $this->editColumnForm->title = $this->column->title;
    }

    public function updateColumn()
    {
        $this->editColumnForm->validate();

        $this->column->update($this->editColumnForm->only('title'));

        $this->dispatch('column-updated');
    }

    public function render()
    {
        return view('livewire.column', [
            'cards' => $this->column->cards()->ordered()->get(),
        ]);
    }
}
