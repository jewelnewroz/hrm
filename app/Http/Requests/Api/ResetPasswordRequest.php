<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\BDMobile;
use App\Traits\ValidationFailedResponseTrait;

class ResetPasswordRequest extends FormRequest
{
    use ValidationFailedResponseTrait;
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'mobile' => ['bail', 'required', 'max:14', new BDMobile(), 'min:11', 'exists:users,mobile'],
            'password' => 'bail|nullable|min:8|max:20',
            'confirm_password' => 'bail|required|min:8|max:20|same:password'
        ];
    }
}
