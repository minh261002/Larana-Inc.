<?php

namespace App\Admin\Services\Service;

use App\Repositories\Service\ServiceRepositoryInterface;
use Illuminate\Http\Request;

class ServiceService implements ServiceServiceInterface
{
    protected $repository;

    public function __construct(
        ServiceRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {
        $data = $request->validated();

        if (empty($data['icon'])) {
            $data['icon'] = '/admin/images/not-found.jpg';
        }

        return $this->repository->create($data);
    }

    public function update(Request $request)
    {
        $data = $request->validated();
        $id = $data['id'];

        if (empty($data['icon'])) {
            $data['icon'] = '/admin/images/not-found.jpg';
        }

        return $this->repository->update($id, $data);
    }
}