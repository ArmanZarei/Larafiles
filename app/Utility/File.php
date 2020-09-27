<?php

namespace App\Utility;

class File
{
    /**
     * @param \App\Model\User $user
     *
     * @return bool
     */
    public static function can_user_download($user)
    {
        $userSubscribe = $user->getCurrentSubscribe();
        return User::is_user_subscribed($user->id) && !($userSubscribe->download_limit == $userSubscribe->download_count);
    }
}