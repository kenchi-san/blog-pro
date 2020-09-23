<?php


namespace App\Classes;


class TokenGenerator
{
    public function newToken()
    {
        try {
            $token = md5(random_bytes(50));
        } catch (\Exception $e) {
        }
        return $token;
    }


}