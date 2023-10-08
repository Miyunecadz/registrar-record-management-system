<?php

namespace App\Http\Requests\Api;

use FormRequestJsonResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class RequestListApiRequest extends FormRequest
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
            'student_id' => ['required', 'int', 'exists:students,id,deleted_at,null'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'count' => request('count', 10),
        ]);
    }
}
