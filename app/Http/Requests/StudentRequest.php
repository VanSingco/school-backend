<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StudentRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'middle_name' => 'required|string',
            'id_picture' => 'required',
            'gender' => 'required|string',
            'birth_date' => 'required|string',
            'birth_place' => 'required|string',
            'citizenship' => 'required|string',
            'mother_tongue' => 'required|string',
            'religion' => 'required|string',
            'street_address' => 'required|string',
            'barangay' => 'required|string',
            'city' => 'required|string',
            'region' => 'required|string',
            'province' => 'required|string',
            'country' => 'required|string',  
            'zipcode' => 'required|string',
            'status' => 'required|string',
            'type' => 'required|string',
            'payment_options' => 'required|string',
            'grade_level_id' => 'required|string',
            'last_grade_level_id' => 'required|string',
            'schoo_year_id' => 'required|string',
            'last_schoo_year_id' => 'required|string',
            'primary_contact_person' => 'required|string',
            'primary_contact_no' => 'required|string',
            'primary_contact_relationship' => 'required|string',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
