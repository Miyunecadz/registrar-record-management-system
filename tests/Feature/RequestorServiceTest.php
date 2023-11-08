<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Student;
use Database\Seeders\RoleSeeder;
use App\Services\RequestorService;

class RequestorServiceTest extends TestCase
{
    /** @test */
    public function canApproveRequestor()
    {
        $this->seed([RoleSeeder::class]);
        $student = Student::factory()->create(['contact_number' => config('vonage.sms_from')]);

        (new RequestorService())->approve($student->id);

        $student->refresh();

        $this->assertDatabaseHas('users', [
            'id' => $student->user_id,
            'username' => $student->student_number
        ]);

        $this->assertDatabaseHas('students', [
            'id' => $student->id,
            'is_approved' => 1,
        ]);
    }

    /** @test */
    public function canDeclineRequestor()
    {
        $this->seed([RoleSeeder::class]);
        $student = Student::factory()->create(['contact_number' => config('vonage.sms_from')]);

        (new RequestorService())->decline($student->id, 'This is just for testing');

        $this->assertDatabaseMissing('students', [
            'id' => $student->id,
            'is_approved' => 1,
        ]);
    }
}
