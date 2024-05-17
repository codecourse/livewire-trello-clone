<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class EditColumn extends Form
{
    #[Validate('required')]
    public string $title = '';
}
