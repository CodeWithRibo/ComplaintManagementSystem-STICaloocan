<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ComplaintRequest extends FormRequest
{




    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category' => ['required', 'string'],
            'location' => ['nullable', 'string', 'min:6', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
            'title' => ['required', 'string', 'min:6', 'max:30', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'description' => ['required', 'string', 'min:10', 'max:300'],
            'incident_time' => ['required', 'date', 'before_or_equal:today'],
            'priority' => ['required', 'string'],
            'image_path' =>  ['nullable', 'image', 'max:3000', 'mimes:jpg,png,jpeg'],
            'type_submit' => ['required', 'string'],
            'full_name' => ['nullable', 'string', 'min:2', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
            'student_id_number' => ['nullable', 'string', 'regex:/^02000[0-9]{6}$/'],
            'email' => ['nullable', 'email', 'regex:/^[a-zA-Z0-9]+(?:[._-][a-zA-Z0-9]+)*@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/'],
            'phone_number' => ['nullable', 'max:11', 'regex:/^[0-9]+$/'],
            'year_section' => ['nullable','string', 'regex:/^\d{1}(st|nd|rd|th)\s*Year\s*-\s*[A-Z]{2,}-\d{3}$/i'],
            'consent_given' => ['required', 'boolean']
        ];
    }
}
