<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'name' => ['required'],
                'email' => ['required', 'email'],
                'type' => ['required', Rule::in(['I', 'B', 'i', 'b'])],
                'address' => ['required'],
                'city' => ['required'],
                'postalCode' => ['required'],
            ];
        } else {
            // For PATCH
            return [
                'name' => ['sometimes', 'required'],
                'email' => ['sometimes', 'required', 'email'],
                'type' => ['sometimes', 'required', Rule::in(['I', 'B', 'i', 'b'])],
                'address' => ['sometimes', 'required'],
                'city' => ['sometimes', 'required'],
                'postalCode' => ['sometimes', 'required'],
            ];
        }
        

    }

    // postalCode value store in postal_code
    protected function prepareForValidation() {
        if ($this->postalCode) {
            $this->merge([
                'postal_code' => $this->postalCode
            ]);
        }
    }
}
