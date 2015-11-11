<?php
if ( ! function_exists('generateRandomSalt'))
{
    function generateRandomSalt()
    {
        // Salt seed
        $seed = uniqid(mt_rand(), true);

        // Generate salt
        $salt = base64_encode($seed);
        $salt = str_replace('+', '.', $salt);

        return substr($salt, 0, 22);
    }
}

if ( ! function_exists('formatar_data'))
{
    function formatar_data($str)
    {
        $str = substr($str, 8, 2) . '/' . substr($str, 5, 2) . '/' .  substr($str, 0, 4);

        return $str;
    }
}