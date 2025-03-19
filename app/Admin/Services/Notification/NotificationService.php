<?php

namespace App\Admin\Services\Notification;

use App\Repositories\Admin\AdminRepositoryInterface;
use App\Repositories\Notification\NotificationRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

class NotificationService implements NotificationServiceInterface
{
    protected $repository;

    protected $adminRepository;

    protected $userRepository;

    public function __construct(
        NotificationRepositoryInterface $repository,
        AdminRepositoryInterface $adminRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->repository = $repository;
        $this->adminRepository = $adminRepository;
        $this->userRepository = $userRepository;
    }
}
