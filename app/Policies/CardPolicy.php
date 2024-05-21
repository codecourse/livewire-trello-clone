<?php

namespace App\Policies;

use App\Models\Card;
use App\Models\Column;
use App\Models\User;

class CardPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Card $card)
    {
        return $user->id === $card->user_id;
    }

    public function archive(User $user, Card $card)
    {
        return $user->id === $card->user_id;
    }
}
