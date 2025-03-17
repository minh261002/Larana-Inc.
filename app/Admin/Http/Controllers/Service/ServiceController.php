<?php

namespace App\Admin\Http\Controllers\Service;

use App\Admin\DataTables\Service\ServiceDataTable;
use App\Admin\Http\Requests\Service\ServiceRequest;
use App\Admin\Services\Service\ServiceServiceInterface;
use App\Enums\Service\ServiceGroup;
use App\Repositories\Service\ServiceRepositoryInterface;

class ServiceController
{
    protected $repository;

    protected $service;

    public function __construct(
        ServiceRepositoryInterface $repository,
        ServiceServiceInterface $service
    ) {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index(ServiceDataTable $dataTable)
    {
        return $dataTable->render('admin.service.index');
    }

    public function create()
    {
        $serviceGroups = ServiceGroup::asSelectArray();
        return view('admin.service.create', compact('serviceGroups'));
    }

    public function store(ServiceRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin.service.index')->with('success', 'Thêm dịch vụ mới thành công');
    }

    public function edit($id)
    {
        $service = $this->repository->findOrFail($id);
        $serviceGroups = ServiceGroup::asSelectArray();
        return view('admin.service.edit', compact('service', 'serviceGroups'));
    }

    public function update(ServiceRequest $request)
    {
        $this->service->update($request);
        return redirect()->route('admin.service.index')->with('success', 'Cập nhật dịch vụ thành công');
    }

    public function delete($id)
    {
        $this->repository->delete($id);
        return response()->json(['status' => 'success', 'message' => 'Xóa dịch vụ thành công']);
    }
}
