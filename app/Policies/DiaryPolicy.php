<?php

namespace App\Policies;

use App\Models\Diary;
use App\Models\User;

class DiaryPolicy
{
    public function update(User $user, Diary $diary)
    {
        return $user->id === $diary->user_id;
    }

    public function delete(User $user, Diary $diary)
    {
        return $user->id === $diary->user_id;
    }
}
