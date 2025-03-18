<?php

namespace App\Host\Services\Property;

use Illuminate\Http\Request;

interface PropertyServiceInterface
{
    public function store(Request $request);
}