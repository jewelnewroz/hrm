<?php

namespace App\Rules;

use App\Constant\AppConst;
use Illuminate\Contracts\Validation\Rule;

class BDMobile implements Rule
{
    public function passes($attribute, $value): bool
    {
        return preg_match(AppConst::MOBILE_NUMBER_PATTERN, $value);
    }

    public function message(): string
    {
        return ':attribute should be a valid mobile number';
    }
}
