<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class EditCard extends Form
{
    #[Validate('required')]
    public string $title = '';

    #[Validate('nullable')]
    public ?string $notes = '';
}
