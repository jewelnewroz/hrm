<?php

namespace Larabill\Helper;

use Larabill\Models\Billing;
use Larabill\Models\Customer;
use Larabill\Models\CustomerRequest;
use Larabill\Models\User;

class CommonHelper
{
    public static function bindCustomerID($customerID)
    {
        if(getOption('domain_ext_enabled', 0) && !is_null(getOption('domain_name'))) {
            $ext = '@' . getOption('domain_name');
            $customerID = str_replace($ext, '', $customerID);
            $customerID .= $ext;
        }
        return $customerID;
    }

    public static function parseTemplate($string, $array)
    {
        foreach( $array as $key => $value ) {
            $string = preg_replace("/{" . $key ."}/i", $value, $string);
        }

        return $string;
    }

    public static function _customerIDExist($id, $customerID): bool
    {
        return (bool) Customer::where('id', '!=', $id)->where('customerID', $customerID)->count();
    }

    public static function _mobileExist($id, $mobile): bool
    {
        return (bool) Customer::where('id', '!=', $id)->where('primary_contact', $mobile)->count();
    }

    public static function _usernameExist($userId, $username): bool
    {
        return (bool) User::where('id', '!=', $userId)->where('username', $username)->count();
    }

    public static function _emailExist($userId, $email): bool
    {
        return (bool) User::where('id', '!=', $userId)->where('email', $email)->count();
    }

    public static function billNotExist($customer, $month = null): bool
    {
        $month = ($month == null) ? date('F-Y') : $month;
        return Billing::where(['bill_month' => $month, 'customer_id' => $customer->id])->count() === 0;
    }

    public static function billExist($customer, $month = null): bool
    {
        $month = ($month == null) ? date('F-Y') : $month;
        return Billing::where(['bill_month' => $month, 'customer_id' => $customer->id])->count() > 0;
    }

    public static function requestExists($request): bool
    {
        return (bool) CustomerRequest::where(['customer_id' => $request->customer_id, 'type' => $request->type, 'status' => 0])->count();
    }

    public static function numberFormat($number)
    {
        return self::{getOption('number_format', 'ceil')}($number);
    }

    public static function customerStatus($status)
    {
        return config('common.customer.statuses')[$status];
    }

    public static function calculateBill(Customer $customer)
    {
        $bills = 0;
        $package_bill = $customer->package['price'];
        $billType = getOption('bill_type', 'daily');
        $remainingDays = ((int) date('d') >= 10 && (int) date('d')) + 1;
        if (date('F-Y', strtotime($customer->created_at)) == date('F-Y')) {
            if (!$customer->reseller) {
                $bills += $customer->setup_charge;
                $bills += $customer->cable_cost;
                $bills += $customer->initial_dues;
            }
            $bills = self::getCalculation($billType, $remainingDays, $package_bill, $bills);
        } else {
            $bills = self::getCalculation($billType, $remainingDays, $package_bill, $bills);
            $bills += ($customer->bill) ? $customer->bill->dues : 0;
        }
        return self::numberFormat($bills);
    }

    private static function getCalculation($billType, $remainingDays, $package_bill, $bills)
    {
        switch ($billType) {
            case 'bi-monthly':
                if ($remainingDays <= 25) {
                    $bills += ($package_bill / 2);
                } elseif (date('d') > 25) {
                    $bills += 0;
                } else {
                    $bills += $package_bill;
                }
                break;
            case 'quarterly':
                if (date('d') <= 7) {
                    $bills += $package_bill;
                } elseif (date('d') > 7 && date('d') <= 20) {
                    $bills += ($package_bill / 2);
                } else {
                    $bills += 0;
                }
                break;
            default :
                $bills += ($package_bill / date('t')) * $remainingDays;
                break;
        }
        return $bills;
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
