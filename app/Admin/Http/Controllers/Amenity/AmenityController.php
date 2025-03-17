<?php

namespace App\Admin\Http\Controllers\Amenity;

use App\Admin\DataTables\Amenity\AmenityDataTable;
use App\Admin\Services\Amenity\AmenityServiceInterface;
use App\Enums\Amenity\AmenityGroup;
use App\Http\Controllers\Controller;
use App\Admin\Http\Requests\Amenity\AmenityRequest;
use App\Repositories\Amenity\AmenityRepositoryInterface;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    protected $repository;
    protected $service;

    public function __construct(
        AmenityRepositoryInterface $repository,
        AmenityServiceInterface $service
    ) {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index(AmenityDataTable $dataTable)
    {
        return $dataTable->render('admin.amenity.index');
    }

    public function create()
    {
        $amenityGroups = AmenityGroup::asSelectArray();
        return view('admin.amenity.create', compact('amenityGroups'));
    }

    public function store(AmenityRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin.amenity.index')->with('success', 'Thêm tiện ích mới thành công');
    }

    public function edit(int $id)
    {
        $amenity = $this->repository->findOrFail($id);
        $amenityGroups = AmenityGroup::asSelectArray();
        return view('admin.amenity.edit', compact('amenity', 'amenityGroups'));
    }

    public function update(AmenityRequest $request)
    {
        $this->service->update($request);
        return redirect()->route('admin.amenity.index')->with('success', 'Cập nhật tiện ích thành công');
    }

    public function delete(int $id)
    {
        $this->repository->delete($id);
        return response()->json(['status' => 'success', 'message' => 'Xóa tiện ích thành công']);
    }
}
