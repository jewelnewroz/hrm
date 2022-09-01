<?php

namespace App\Helper;

use App\Models\User;

class CommonHelper
{
    public static function parseTemplate($string, $array)
    {
        foreach( $array as $key => $value ) {
            $string = preg_replace("/{" . $key ."}/i", $value, $string);
        }

        return $string;
    }

    public static function _usernameExist($userId, $username): bool
    {
        return (bool) User::where('id', '!=', $userId)->where('username', $username)->count();
    }

    public static function _emailExist($userId, $email): bool
    {
        return (bool) User::where('id', '!=', $userId)->where('email', $email)->count();
    }

    public static function numberFormat($number)
    {
        return self::{getOption('number_format', 'ceil')}($number);
    }

    public static function customerStatus($status)
    {
        return config('common.customer.statuses')[$status];
    }

    protected function ceil($number)
    {
        return ceil($number);
    }

    protected function round($number): float
    {
        return round($number, 0);
    }

    protected function floor($number)
    {
        return floor($number);
    }
}
