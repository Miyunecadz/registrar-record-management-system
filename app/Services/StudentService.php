<?php

namespace App\Services;

use App\Models\Student;

class StudentService
{
    public function create(array $studentData)
    {
        return Student::create($studentData);
    }
}
