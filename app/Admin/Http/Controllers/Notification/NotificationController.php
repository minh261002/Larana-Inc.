<?php

namespace App\Admin\Http\Controllers\Notification;

use App\Admin\Http\Requests\Notification\NotificationRequest;
use App\Admin\Services\Notification\NotificationServiceInterface;
use App\Enums\ActiveStatus;
use App\Enums\Notification\NotificationObj;
use App\Enums\Notification\NotificationType;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Repositories\Notification\NotificationRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class NotificationController
{
    protected $repository;
    protected $userRepository;
    protected $adminRepository;

    protected $service;

    public function __construct(
        NotificationRepositoryInterface $repository,
        UserRepositoryInterface $userRepository,
        AdminRepositoryInterface $adminRepository,
        NotificationServiceInterface $service
    ) {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->adminRepository = $adminRepository;
        $this->service = $service;
    }

    public function create()
    {
        $types = NotificationType::asSelectArray();
        $objects = NotificationObj::asSelectArray();
        $users = $this->userRepository->getByQueryBuilder([
            'status' => ActiveStatus::Active->value,
        ])->get();
        $admins = $this->adminRepository->getQueryBuilderOrderBy()->get();

        return view('admin.notification.create', compact('types', 'users', 'admins', 'objects'));
    }

    public function store(NotificationRequest $request)
    {
        dd($request->validated());
    }
}