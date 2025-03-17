<?php

namespace App\Admin\Services\Amenity;

use Illuminate\Http\Request;

interface AmenityServiceInterface
{
    public function store(Request $request);

    public function update(Request $request);
}