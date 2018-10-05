<?php

namespace App\Policies;

use App\Conversation;
use App\User;

class ConversationPolicy
{
    function conversationRead(User $user, Conversation $conversation)
    {
        return ($user->id == $conversation->user_id_lo
            || $user->id == $conversation->user_id_hi);
    }
}
