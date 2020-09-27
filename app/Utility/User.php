<?php

namespace App\Utility;


use App\Model\Subscribe;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class User
{
    public static function is_user_subscribed($user_id = null)
    {
        if (!Auth::check())
            return false;
        
        $user = \App\Model\User::find($user_id);
        if (!$user)
            return false;
        $user_subscribe = $user->subscribes()->where('expires_at', '>=', Carbon::now())->first();
        return !empty($user_subscribe) && ($user_subscribe instanceof Subscribe);
    }
}