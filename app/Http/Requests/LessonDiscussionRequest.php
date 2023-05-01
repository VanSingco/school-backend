<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LessonDiscussionRequest extends FormRequest
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
            'lesson_id' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'quarter' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
