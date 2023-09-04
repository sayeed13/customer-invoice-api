<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
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
        
        return [
                '*.customerId' => ['required', 'integer'],
                '*.amount' => ['required', 'numeric'],
                '*.status' => ['required', Rule::in(['U', 'P', 'V', 'u', 'p', 'v'])],
                '*.issueDate' => ['required', 'date_format:Y-m-d H:i:s'],
                '*.paidDate' => ['date_format:Y-m-d H:i:s', 'nullable']
            ];

    }

    // postalCode value store in postal_code
    protected function prepareForValidation() {
        $data = [];

        foreach ($this->toArray() as $obj) {
            $obj['customer_id'] = $obj['customerId'] ?? null;
            $obj['issue_date'] = $obj['issueDate'] ?? null;
            $obj['paid_date'] = $obj['paidDate'] ?? null;

            $data[] = $obj;
        }

        $this->merge($data);
    }
}
