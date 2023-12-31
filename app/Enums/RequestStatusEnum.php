<?php

namespace App\Enums;

enum RequestStatusEnum : string
{
    case DECLINED = 'declined';
    case PENDING_PAYMENT = 'pending_payment';
    case PENDING_REVIEW = 'pending_for_review';
    case WORKING_ON_REQUEST = 'working_on_request';
    case FOR_PICK_UP = 'for_pick_up';
    case COMPLETED = 'completed';

    public function prettyStatus()
    {
        return match ($this) {
            self::DECLINED => 'DECLINED',
            self::PENDING_PAYMENT => 'PENDING FOR PAYMENT',
            self::PENDING_REVIEW => 'PENDING FOR REVIEW',
            self::WORKING_ON_REQUEST => 'WORKING ON REQUEST',
            self::FOR_PICK_UP => 'FOR PICKUP',
            self::COMPLETED => 'COMPLETED',
            default => self::PENDING_PAYMENT,
        };
    }
}
