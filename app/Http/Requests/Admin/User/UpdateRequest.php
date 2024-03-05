<?php

namespace App\Http\Requests\Admin\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('user')->id;
        return [
            'name' => 'required|string',
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('users')->ignore($userId),
            ],
            'role' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'this field must be filled',
            'name.string' => 'the data must match the string type',
            'email.required' => 'this field must be filled',
            'email.string' => 'the data must match the type',
            'email.email' => "your email must follow the format mailName@email.com",
            'email.unique' => 'a user with that name already exists',
            'role.integer' => 'the data must match the integer type',
            'role.required' => 'this field must be filled',
        ];
    }
}
