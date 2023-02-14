<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class AssignSubjectScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'school_id' => 'required|string',
            'teacher_id' => 'required|string',
            'section_id' => 'required|string',
            'assign_subject_id' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'school_id.reuired' => 'Please select a school.',
            'teacher_id.reuired' => 'Please select a teacher this is required field.',
            'section_id.reuired' => 'Please select a section this is required field.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
