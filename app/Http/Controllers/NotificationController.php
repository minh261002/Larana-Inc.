<?php

namespace App\Http\Controllers;

use App\Repositories\Notification\NotificationRepositoryInterface;

class NotificationController
{
    protected $service;

    protected $repository;

    public function __construct(
        NotificationRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function index()
    {
        $notifications = $this->repository->getByQueryBuilder([
            'user_id' => \Auth::guard('web')->user()->id,
        ])->get();
        return view('client.notification.index', compact('notifications'));
    }

    public function get()
    {
        $notifications = $this->repository->getByQueryBuilder([
            'user_id' => \Auth::guard('web')->user()->id,
        ])->paginate(5);
        return response()->json($notifications);
    }
}