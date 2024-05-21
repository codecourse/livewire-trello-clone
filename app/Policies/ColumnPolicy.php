<?php

namespace App\Policies;

use App\Models\Column;
use App\Models\User;

class ColumnPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Column $column)
    {
        return $user->id === $column->user_id;
    }

    public function archive(User $user, Column $column)
    {
        return $user->id === $column->user_id;
    }

    public function createCard(User $user, Column $column)
    {
        return $user->id === $column->user_id;
    }
}
