<?php

namespace App\Http\Requests\Api;

use App\Rules\UniqueStudentNumberRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FormRequestJsonResponseTrait;

class StudentStoreApiRequest extends FormRequest
{
    /**
     * Trait for making response json format
     */
    use FormRequestJsonResponseTrait;

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
            'student_number' => ['sometimes', 'string', 'max:50', new UniqueStudentNumberRule],
            'first_name' => ['required', 'string', 'max:100'],
            'middle_name' => ['sometimes', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:10'],
            'suffix' => ['sometimes', 'string', 'max:100'],
            'sex' => ['required', 'string', 'max:10'],
            'contact_number' => ['required', 'string', 'max:20'],
            'birth_date' => ['required', 'date_format:Y-m-d'],
            'birth_place' => ['required', 'string'],
            'address' => ['required', 'string'],
            'degree' => ['required', 'string', 'max:100'],
            'major' => ['sometimes', '', 'string', 'max:100'],
            'year_level' => ['required', 'numeric', 'min:1', 'max:5'],
            'date_enrolled' => ['required', 'date_format:Y-m-d'],
            'is_graduated' => ['sometimes', '', 'boolean'],
            'date_graduated' => ['required_if:is_graduated,true', 'date_format:Y-m-d'],
        ];
    }
}
