<?php

namespace App\Repositories\Service;

use App\Repositories\BaseRepository;
use App\Models\Service;

class ServiceRepository extends BaseRepository implements ServiceRepositoryInterface
{
    public function getModel()
    {
        return Service::class;
    }
}