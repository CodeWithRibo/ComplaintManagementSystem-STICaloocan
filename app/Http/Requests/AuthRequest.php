<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class AuthRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
            'last_name' => ['required', 'string', 'min:3',  'max:50', 'regex:/^[a-zA-Z\s.-]+$/'],
            'email' => ['required', 'email', 'unique:users', 'regex:/^[a-zA-Z0-9]+(?:[._-][a-zA-Z0-9]+)*@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/'],
            'password' => [
                'required',
                'string',
                'confirmed:repeat_password',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'student_id_number' => ['required', 'string', 'unique:users', 'regex:/^02000[0-9]{6}$/'],
            'grade_level' => ['required', 'string'],
            'program' => ['required', 'string'],
            'contact_number' => ['nullable', 'max:11', 'regex:/^[0-9]+$/'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'student_id_number.regex' => 'The number must start with 02000 and contain at least 11 digits',
        ];
    }
}
