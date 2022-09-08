<?php
namespace App\Constant;

class AppConst
{
    const MOBILE_NUMBER_PATTERN = "/^(01){1}[3456789]{1}(\d){8}$/";
    const STRONG_PASSWORD_PATTERN = '^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$^';
}
