<?php

namespace App\Admin\Services\Amenity;

use App\Repositories\Amenity\AmenityRepositoryInterface;
use Illuminate\Http\Request;

class AmenityService implements AmenityServiceInterface
{
    protected $repository;

    public function __construct(
        AmenityRepositoryInterface $repository
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