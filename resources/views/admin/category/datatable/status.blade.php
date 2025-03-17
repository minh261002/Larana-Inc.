<span @class(['badge', App\Enums\ActiveStatus::from($status)->badge()])>{{ \App\Enums\ActiveStatus::getDescription($status) }}</span>
