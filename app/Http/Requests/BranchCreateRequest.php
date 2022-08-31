<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:191',
            'parent_id' => 'bail|nullable|numeric|exists:branches,id',
            'address_line_1' => 'required|max:191',
            'address_line_2' => 'nullable|string|max:191',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
            'city' => 'required|string|max:191',
            'country' => 'required|string|max:191'
        ];
    }
}
