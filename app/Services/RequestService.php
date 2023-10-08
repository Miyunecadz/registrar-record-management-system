<?php

namespace App\Services;

use App\Models\Request;

class RequestService
{
    public function list(string|int $studentId, bool $isPaginated = false, int $count = 10)
    {
        $requests = Request::with(['requestItems', 'transactions'])
            ->where('student_id', $studentId);

        if ($isPaginated) {
            return $requests->paginate($count);
        }

        return $requests->get();
    }
}
