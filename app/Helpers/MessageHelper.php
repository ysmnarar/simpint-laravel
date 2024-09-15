<?php

namespace App\Helpers;

class MessageHelper{

    public static function error($status, $message){
        return response()->json([
            'status' => $status,
            'messages' => $message,
        ], 200);
    }

    public static function resultAuth($status, $message, $data, $responCode){
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data'=> $data,
        ], $responCode);
    }
}