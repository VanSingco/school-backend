<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class FamilyRequest extends FormRequest
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
            'primary_contact_person' => 'required|string',
            'primary_contact_number' => 'required|numeric',
            'primary_contact_email' => 'required|string|unique:families,primary_contact_email,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'primary_contact_person.reuired' => 'Please add primary contact person, this is required.',
            'primary_contact_number.reuired' => 'Please add primary contact number, this is required.',
            'primary_contact_email.reuired' => 'Please add primary email, this is required.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
