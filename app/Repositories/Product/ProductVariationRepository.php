<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use App\Models\ProductVariation;

class ProductVariationRepository extends BaseRepository implements ProductVariationRepositoryInterface
{
    public function getModel()
    {
        return ProductVariation::class;
    }
}