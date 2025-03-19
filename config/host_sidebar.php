<?php

return [
    [
        'active' => ['host.property.*'],
        'show' => ['host.property.*'],
        'title' => 'Quản lý tài sản',
        'icon' => 'ti ti-home fs-2',
        'children' => [
            [
                'title' => 'Thêm mới',
                'route' => 'host.property.create',
                'icon' => 'ti ti-plus fs-3 me-2',
            ],
            [
                'title' => 'Danh sách',
                'route' => 'host.property.index',
                'icon' => 'ti ti-list fs-3 me-2',
            ]
        ]
    ],
];
