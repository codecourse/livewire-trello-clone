<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateCard extends Form
{
    #[Validate('required')]
    public string $title = '';
}
