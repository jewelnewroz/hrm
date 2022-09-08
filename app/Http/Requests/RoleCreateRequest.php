<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => 'bail|required|unique:roles,name',
            'permission' => 'bail|required|array'
        ];
    }
}
