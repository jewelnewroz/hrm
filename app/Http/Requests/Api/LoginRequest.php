<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\BDMobile;
use App\Traits\ValidationFailedResponseTrait;

/**
 * @property mixed $password
 */
class LoginRequest extends FormRequest
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
            'password' => 'required|min:6'
        ];
    }
}
