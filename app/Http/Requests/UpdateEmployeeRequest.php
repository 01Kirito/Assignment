<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateEmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
                'full_name' => ['required', 'string', 'max:255'],
                'age' => ['numeric', 'required'],
                'salary' => ['numeric', 'required'],
                'date_of_employment' => ['required', 'date', 'before_or_equal:today', 'date_format:Y-m-d'],
                'email' => ['required','email','unique:employees'],
                'password' => ['required', 'string', new Password(8)],
                'manager_id' => ['numeric', 'required'],
        ];
    }
}
