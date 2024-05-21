<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateBoard extends Form
{
    #[Validate('required')]
    public string $title = '';
}
