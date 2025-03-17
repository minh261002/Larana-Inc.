<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use App\Models\VariationAttribute;

class VariationAttributeRepository extends BaseRepository implements VariationAttributeRepositoryInterface
{
    public function getModel()
    {
        return VariationAttribute::class;
    }
}