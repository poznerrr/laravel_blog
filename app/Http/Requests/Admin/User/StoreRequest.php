<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'role' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=> "Field name is required",
            'name.string'=> "Field name is string format",
            'email.required'=> "Field email is required",
            'email.string'=> "Field email is string format",
            'email.email'=> "Field name must correspond to email ",
            'email.unique'=> "Email already exists",
            'role.required'=> "Field role is required",
        ];
    }
}
