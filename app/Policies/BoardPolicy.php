<?php

namespace App\Policies;

use App\Models\Board;
use App\Models\User;

class BoardPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function show(User $user, Board $board)
    {
        return $user->id === $board->user_id;
    }

    public function createColumn(User $user, Board $board)
    {
        return $user->id === $board->user_id;
    }
}
