<?php

namespace App\Http\Requests\Employee;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeFilterRequest extends FormRequest
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
            'name' => 'string',
            'email' => 'string',
            'phone' => 'numeric',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->errors = $validator->errors();
    }
}
