<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\RoleEnum;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function routeNotificationForVonage(Notification $notification)
    {
        $information = $this->load(['role', 'student', 'employee']);

        return match($information->role->name) {
            RoleEnum::ADMIN->value => $information->employee->contact_number,
            RoleEnum::REGISTRAR->value => $information->employee->contact_number,
            RoleEnum::STUDENT->value => $information->student->contact_number,
            default => config('vonage.sms_from'),
        };
    }

    public function getFullName()
    {
        $information = $this->load(['role', 'student', 'employee']);

        return match($information->role->name) {
            RoleEnum::ADMIN->value => $information->employee->fullName(),
            RoleEnum::REGISTRAR->value => $information->employee->fullName(),
            RoleEnum::STUDENT->value => $information->student->fullName(),
            default => config('vonage.sms_from'),
        };
    }
}
