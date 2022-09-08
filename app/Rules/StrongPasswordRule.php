<?php
namespace App\Rules;

use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Rule;

class StrongPasswordRule implements Rule
{
    public bool $uppercasePasses = true;
    public bool $numericPasses = true;
    public bool $specialCharacterPasses = true;

    public function passes($attribute, $value): bool
    {
        $this->uppercasePasses = (Str::lower($value) !== $value);
        $this->numericPasses = ((bool) preg_match('/[0-9]/', $value));
        $this->specialCharacterPasses = ((bool) preg_match('/[^A-Za-z0-9]/', $value));

        return ($this->uppercasePasses && $this->numericPasses && $this->specialCharacterPasses);
    }

    public function message(): string
    {
        switch (true) {
            case ! $this->uppercasePasses
                && $this->numericPasses
                && $this->specialCharacterPasses:
                return 'The :attribute must contain at least one uppercase character.';

            case ! $this->numericPasses
                && $this->uppercasePasses
                && $this->specialCharacterPasses:
                return 'The :attribute must contain at least one number.';

            case ! $this->specialCharacterPasses
                && $this->uppercasePasses
                && $this->numericPasses:
                return 'The :attribute must contain at least one special character.';

            case ! $this->uppercasePasses
                && ! $this->numericPasses
                && $this->specialCharacterPasses:
                return 'The :attribute must contain at least one uppercase character and one number.';

            case ! $this->uppercasePasses
                && ! $this->specialCharacterPasses
                && $this->numericPasses:
                return 'The :attribute must contain at least one uppercase character and one special character.';

            case ! $this->uppercasePasses
                && ! $this->numericPasses
                && ! $this->specialCharacterPasses:
                return 'The :attribute must contain at least one uppercase character, one number, and one special character.';

            default:
                return 'The :attribute is not strong enough';
        }
    }
}
