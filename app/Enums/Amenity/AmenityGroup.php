<?php

namespace App\Enums\Amenity;

use App\Supports\Enum;

enum AmenityGroup: string
{
    use Enum;

    case Basic = 'basic';

    case Kitchen = 'kitchen';

    case Media = 'media';

    case Ourdoor = 'outdoor';

    case Security = 'security';

    case Luxury = 'luxury';

    case Other = 'other';

    public function badge(): string
    {
        return match ($this) {
            AmenityGroup::Basic => 'bg-green text-green-fg',
            AmenityGroup::Kitchen => 'bg-red text-red-fg',
            AmenityGroup::Media => 'bg-blue text-blue-fg',
            AmenityGroup::Ourdoor => 'bg-yellow text-yellow-fg',
            AmenityGroup::Security => 'bg-purple text-purple-fg',
            AmenityGroup::Luxury => 'bg-pink text-pink-fg',
            AmenityGroup::Other => 'bg-orange text-orange-fg',
        };
    }
}
