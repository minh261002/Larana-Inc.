<?php

namespace App\Enums\Booking;

use App\Supports\Enum;

enum BookingStatus: string
{
    use Enum;

    case Pending = 'pending';

    case Approved = 'approved';

    case Rejected = 'rejected';

    public function badge(): string
    {
        return match ($this) {
            BookingStatus::Pending => 'bg-yellow text-yellow-fg',
            BookingStatus::Approved => 'bg-green text-green-fg',
            BookingStatus::Rejected => 'bg-red text-red-fg',
        };
    }
}
