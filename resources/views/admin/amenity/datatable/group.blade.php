<span @class([
    'badge',
    App\Enums\Amenity\AmenityGroup::from($group)->badge(),
])>{{ \App\Enums\Amenity\AmenityGroup::getDescription($group) }}</span>
