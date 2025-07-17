<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

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
            'location' => ['nullable', 'string', 'min:6', 'max:50', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'title' => ['required', 'string', 'min:6', 'max:30', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'description' => ['required', 'string', 'min:10', 'max:4000'],
            'incident_time' => ['required', 'date', 'before_or_equal:' . now()->format('Y-m-d H:i:s') ],
            'priority' => ['required', 'string'],
            'image_path' =>  ['nullable', 'image', 'max:5000', 'mimes:jpg,png,jpeg'],
            'resolution_note' => ['nullable', 'string'],
            'type_submit' => ['required', 'string'],
            'full_name' => ['nullable'],
            'student_id_number' => ['nullable'],
            'email' => ['nullable'],
            'phone_number' => ['nullable', 'max:11', 'regex:/^[0-9]+$/'],
            'year_section' => ['nullable'],
            'consent_given' => ['required', 'boolean'],
            'is_anonymous' => ['nullable', 'boolean'],
            'complaint_tracker' => ['nullable']
        ];
    }

    public function messages(): array
    {
        return [
            'year_section.regex' => 'The format must follow: Year and Section (e.g., 1st Year - BT-207).',
            'incident_time.before_or_equal' => 'Please enter the actual date and time the incident occurred — future dates are not allowed.',
        ];
    }

}
