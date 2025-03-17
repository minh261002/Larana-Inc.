<span @class([
    'badge',
    App\Enums\Service\ServiceGroup::from($group)->badge(),
])>{{ \App\Enums\Service\ServiceGroup::getDescription($group) }}</span>
