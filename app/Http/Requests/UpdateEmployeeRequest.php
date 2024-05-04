<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateEmployeeRequest extends FormRequest
{
    protected function prepareForValidation()
    {
//      we add this function to avoid checking same user email for duplication
        $this->merge([
            'employeeId' => $this->route('employee')->id,
        ]);
    }

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
            'email' => ['required','email',Rule::unique('employees')->ignore($this->employeeId)],
            'password' => ['required', 'string', new Password(8)],
            'manager_id' => ['numeric', 'required'],
        ];
    }
}
