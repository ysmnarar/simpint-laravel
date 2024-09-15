<?php

namespace App\Helpers;

use Carbon\Carbon;
use App\Models\User;

class FormatHelper{
    public static function formatResultAuth($user){

        return [
            'user_id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'username' => $user->username,
            'email' => $user->email,
            'address' => $user->address,
            'city' => $user->city,
            'phone' => $user->phone,
            'tanggal_tambah' => Carbon::parse($user->created_at)->translatedFormat('d F Y'),

        ];
    }

    public static function ResultUser($user_id){

        $user = User::where('id', $user_id)->get()->map(function ($user) {
            return FormatHelper::formatResultAuth($user);
                    
        });

        return $user;

    }
}
