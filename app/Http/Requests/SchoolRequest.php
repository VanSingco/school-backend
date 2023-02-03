<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SchoolRequest extends FormRequest
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
            'id_number' => 'required|unique:schools,id_number,'.$this->id,
            'name' => 'required|string|unique:schools,name,'.$this->id,
            'email' => 'required|string|unique:schools,email,'.$this->id,
            'contact_no' => 'required',
            'curricular_offering' => 'required|string',
            'classification' => 'required|string',
            'district' => 'required|string',
            'division' => 'required|string',
            'region' => 'required|string',
            'province' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'address' => 'required|string',
            'accredited_to_deped' => 'required|string',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
