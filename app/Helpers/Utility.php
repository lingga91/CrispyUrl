<?php

namespace App\Helpers;

class Utility {

    public static function generateRandomString($length = 10): string 
    {
        /** 
         * generate an alphanumeric string based
         * on the specific length given
        */
        
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomString;
    }

}