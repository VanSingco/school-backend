<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class TeacherRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'middle_name' => 'required|string',
            'contact_no' => 'required|numeric',
            'picture' => 'required',
            'gender' => 'required|string',
            'birth_date' => 'required|string',
            'birth_place' => 'required|string',
            'citizenship' => 'required|string',
            'street_address' => 'required|string',
            'barangay' => 'required|string',
            'city' => 'required|string',
            'region' => 'required|string',
            'province' => 'required|string',
            'country' => 'required|string',  
            'zipcode' => 'required|string',
            'highest_education_attaiment' => 'required|string',
            'is_active' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
