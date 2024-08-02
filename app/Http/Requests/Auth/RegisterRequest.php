<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
        return [
            'first_name' => 'required|string|max:120',
            'last_name' => 'required|string|max:60',
            'address' => 'required|string|max:255',
            'gender' => 'required|numeric|in:1,2',
            'birthday' => 'required|date_format:Y/m/d',
            'email' => [
                'required', 'string',
                'email', 'max:255',
                Rule::unique('users', 'email')->where('deleted_at', null)
            ],
            'phone_number' => 'required|string|min:10|max:11',
            'password' => ['required', 'min:8', 'max:16', 'confirmed'],
        ];
    }
}
