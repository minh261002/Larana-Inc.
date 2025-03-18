<?php

namespace App\Host\Http\Controllers\Property;

use App\Enums\ActiveStatus;
use App\Host\Http\Requests\Property\PropertyRequest;
use App\Host\Services\Property\PropertyServiceInterface;
use App\Repositories\Amenity\AmenityRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Service\ServiceRepositoryInterface;
use Illuminate\Http\Request;

class PropertyController
{
    protected $categoryRepository;
    protected $amenityRepository;
    protected $serviceRepository;
    protected $service;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        AmenityRepositoryInterface $amenityRepository,
        ServiceRepositoryInterface $serviceRepository,
        PropertyServiceInterface $service
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->amenityRepository = $amenityRepository;
        $this->serviceRepository = $serviceRepository;
        $this->service = $service;
    }

    public function first()
    {
        $categories = $this->categoryRepository->getByQueryBuilder([
            'status' => ActiveStatus::Active->value
        ])->get();

        $amenities = $this->amenityRepository->getQueryBuilderOrderBy()->get()->groupBy('group');
        $services = $this->serviceRepository->getQueryBuilderOrderBy()->get()->groupBy('group');
        return view('host.property.first', compact('categories', 'amenities', 'services'));
    }

    public function storeFirst(PropertyRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('host.dashboard')->with('success', 'Thêm chỗ ở mới thành công');
    }
}