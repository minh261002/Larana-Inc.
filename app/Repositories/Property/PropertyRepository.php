<?php

namespace App\Repositories\Property;

use App\Models\Property;
use App\Repositories\BaseRepository;

class PropertyRepository extends BaseRepository implements PropertyRepositoryInterface
{
    public function getModel()
    {
        return Property::class;
    }
}
