<?php

namespace App\Http\Requests;

use App\Rules\BDMobile;
use App\Rules\StrongPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => 'bail|required|string',
            'email' => 'bail|required|email|unique:users,email',
            'password' => ['bail', 'required', 'min:6', 'max:32', new StrongPasswordRule()],
            'password_confirm' => 'bail|required|same:password',
            'mobile' => ['bail', 'required', 'string', new BDMobile()]
        ];
    }
}
