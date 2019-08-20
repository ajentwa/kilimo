<?php
namespace App\Helpers;


class General
{

    public static function moneyFormat($number, $fractional = false)
    {
        return number_format((float)$number, 0, '.', ',');
    }

    public static function random_string($length)
    {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

}
