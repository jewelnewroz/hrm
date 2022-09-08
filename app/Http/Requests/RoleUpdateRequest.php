<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
//        dd($this->session->getId());
        return [
            'name' => 'bail|required|unique:roles,name,' . $this->role,
            'permission' => 'bail|required|array'
        ];
    }
}
