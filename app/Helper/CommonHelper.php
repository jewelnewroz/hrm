<?php

namespace App\Helper;

use App\Models\User;

class CommonHelper
{
    public static function parseTemplate($string, $array)
    {
        foreach ($array as $key => $value) {
            $string = preg_replace("/{" . $key . "}/i", $value, $string);
        }

        return $string;
    }

    public static function _usernameExist($userId, $username): bool
    {
        return (bool)User::where('id', '!=', $userId)->where('username', $username)->count();
    }

    public static function _emailExist($userId, $email): bool
    {
        return (bool)User::where('id', '!=', $userId)->where('email', $email)->count();
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

    public static function dataTableButtons(array $buttons): array
    {
        $str = [];
        if (in_array('copy', $buttons)) {
            $str[] = [
                'extend' => 'copy',
                'text' => '<i class="fas fa-copy"></i> ',
                'titleAttr' => 'Copy to clipboard',
                'className' => 'btn btn-sm btn-default',
                'messageTop' => 'All Customers',
                'footer' => true,
                'exportOptions' => [
                    'columns' => [':visible']
                ]
            ];
        }

        if (in_array('pdf', $buttons)) {
            $str[] = [
                'extend' => 'pdf',
                'title' => "Customer list",
                'text' => '<i class="fas fa-file-pdf"></i> ',
                'titleAttr' => 'Export to PDF',
                'className' => 'btn btn-sm btn-success',
                'messageTop' => 'All Customers',
                'orientation' => 'landscape',
                'footer' => true,
                'exportOptions' => [
                    'columns' => [':visible']
                ]
            ];
        }

        if (in_array('print', $buttons)) {
            $str[] = [
                'extend' => 'print',
                'text' => '<i class="fa fa-print"></i> ',
                'titleAttr' => 'Print customer',
                'className' => 'btn btn-sm btn-info',
                'messageTop' => 'All Customers',
                'footer' => true,
                'exportOptions' => [
                    'columns' => [1, 2, ':visible']
                ]
            ];
        }

        if (in_array('visibility', $buttons)) {
            $str[] = [
                'extend' => 'colvis',
                'postfixButtons' => ['colvisRestore'],
                'className' => 'btn btn-sm btn-default'
            ];
        }
        return $str;
    }
}
