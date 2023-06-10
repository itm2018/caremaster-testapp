<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
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
        $regex = '/^(\+\d{1,2}\s?)?[\s.-]?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/';
        return [
            'first_name' => ['string', 'max:255', 'required'],
            'last_name' => ['string', 'max:255', 'required'],
            'email' => ['email', 'max:255'],
            'phone' => ['string', 'max:30', 'required', 'regex:' . $regex],
            'company_id' => ['int', 'required', 'exists:companies,id']
        ];
    }
}
