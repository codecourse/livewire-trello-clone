<?php

namespace App\Livewire;

use Livewire\Component;

class Column extends Component
{
    public \App\Models\Column $column;

    public function render()
    {
        return view('livewire.column');
    }
}
