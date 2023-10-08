<?php

namespace App\Rules;

use App\Models\Student;
use Illuminate\Contracts\Validation\Rule;

class UniqueStudentNumberRule implements Rule
{
    public function passes($attribute, $value)
    {

        if (! empty($value)) {

            return ! Student::where('student_number', $value)->exists();
        }

        return true;
    }

    public function message()
    {
        return 'The Student id has already been taken.';
    }
}
