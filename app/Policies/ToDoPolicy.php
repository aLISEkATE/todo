<?php

namespace App\Policies;

use App\Models\ToDo;
use App\Models\User;

class ToDoPolicy
{
    public function update(User $user, ToDo $todo)
    {
        return $user->id === $todo->user_id;
    }

    public function delete(User $user, ToDo $todo)
    {
        return $user->id === $todo->user_id;
    }

    public function view(User $user, ToDo $todo)
    {
        return $user->id === $todo->user_id;
    }
}
