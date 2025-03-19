<?php

use App\Enums\ActiveStatus;
use App\Enums\Amenity\AmenityGroup;
use App\Enums\Module\ModuleStatus;
use App\Enums\Notification\NotificationObj;
use App\Enums\Notification\NotificationType;
use App\Enums\Service\ServiceGroup;
use App\Enums\User\UserLoginType;
use App\Enums\User\UserRole;

return [
    ActiveStatus::class => [
        ActiveStatus::Active->value => 'Đang hoạt động',
        ActiveStatus::InActive->value => 'Không hoạt động',
    ],
    ModuleStatus::class => [
        ModuleStatus::Completed->value => 'Hoàn thành',
        ModuleStatus::InProgress->value => 'Đang tiến hành',
    ],
    UserLoginType::class => [
        UserLoginType::Email->value => 'Email',
        UserLoginType::Google->value => 'Google',
        UserLoginType::Facebook->value => 'Facebook',
    ],
    UserRole::class => [
        UserRole::Guest->value => 'Khách hàng',
        UserRole::Host->value => 'Chủ nhà'
    ],
    AmenityGroup::class => [
        AmenityGroup::Basic->value => 'Cơ bản',
        AmenityGroup::Kitchen->value => 'Nhà bếp & ăn uống',
        AmenityGroup::Media->value => 'Giải trí & truyền thông',
        AmenityGroup::Ourdoor->value => 'Ngoài trời',
        AmenityGroup::Security->value => 'An ninh & bảo mật',
        AmenityGroup::Luxury->value => 'Đặc biệt & Sang trọng',
        AmenityGroup::Other->value => 'Khác',
    ],
    ServiceGroup::class => [
        ServiceGroup::Hosting->value => 'Dịch vụ lưu trú',
        ServiceGroup::Food->value => 'Dịch vụ ăn uống',
        ServiceGroup::Transport->value => 'Dịch vụ vận chuyển',
        ServiceGroup::Special->value => 'Dịch vụ đặc biệt',
        ServiceGroup::Other->value => 'Khác',
    ],
    NotificationType::class => [
        NotificationType::One->value => 'Một người cụ thể',
        NotificationType::All->value => 'Tất cả',
    ],
    NotificationObj::class => [
        NotificationObj::All->value => 'Thông báo tất cả',
        NotificationObj::Admin->value => 'Thông báo cho quản trị viên',
        NotificationObj::User->value => 'Thông báo cho khách hàng',
    ],
];
