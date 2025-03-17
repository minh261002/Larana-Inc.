<?php

namespace App\Admin\Services\Service;

use Illuminate\Http\Request;

interface ServiceServiceInterface
{
    public function store(Request $request);

    public function update(Request $request);
}