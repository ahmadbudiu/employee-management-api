<?php

namespace App\Http\Requests\Employee;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
{
    public $errors;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'string',
            'email' => 'email',
            'phone' => 'required|numeric',
            'position' => 'string',
            'bank' => 'string',
            'bank_no' => 'numeric',
            'zip_code' => 'numeric',
            'identity_number' => 'required|numeric',
            'dob' => 'required|date',
            'village_id' => 'required|numeric',
            'address' => 'string',
            'identity' => 'file',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->errors = $validator->errors();
    }
}
