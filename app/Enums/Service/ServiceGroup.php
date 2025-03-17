<?php

namespace App\Enums\Service;

use App\Supports\Enum;

enum ServiceGroup: string
{
    use Enum;

    case Hosting = 'hosting';

    case Food = 'food';

    case Transport = 'transport';

    case Special = 'special';

    case Other = 'other';

    public function badge(): string
    {
        return match ($this) {
            ServiceGroup::Hosting => 'bg-green text-green-fg',
            ServiceGroup::Food => 'bg-red text-red-fg',
            ServiceGroup::Transport => 'bg-blue text-blue-fg',
            ServiceGroup::Special => 'bg-yellow text-yellow-fg',
            ServiceGroup::Other => 'bg-purple text-purple-fg',
        };
    }
}