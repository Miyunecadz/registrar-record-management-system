<?php

namespace App\Enums;

enum RoleEnum: string
{
    case ADMIN = 'admin';
    case REGISTRAR = 'registrar';
    case STUDENT = 'student';

    public function getDisplayName()
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::REGISTRAR => 'Registrar',
            self::STUDENT => 'Student',
            default => self::STUDENT,
        };
    }

    public function getDescription()
    {
        return match ($this) {
            self::ADMIN => 'Administrator of the system',
            self::REGISTRAR => 'Registrar',
            self::STUDENT => 'Student',
            default => self::STUDENT,
        };
    }
}
