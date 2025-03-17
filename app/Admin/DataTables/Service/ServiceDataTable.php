<?php

namespace App\Admin\DataTables\Service;

use App\Admin\DataTables\BaseDataTable;
use App\Enums\Service\ServiceGroup;
use App\Repositories\Service\ServiceRepositoryInterface;

class ServiceDataTable extends BaseDataTable
{
    protected $nameTable = 'serviceTable';
    protected $repository;

    public function __construct(
        ServiceRepositoryInterface $repository
    ) {
        $this->repository = $repository;
        parent::__construct();
    }
    public function setView(): void
    {
        $this->view = [
            'action' => 'admin.service.datatable.action',
            'group' => 'admin.service.datatable.group',
            'image' => 'admin.service.datatable.image',
        ];
    }
    public function query()
    {
        return $this->repository->getQueryBuilderOrderBy();
    }

    public function setColumnSearch(): void
    {

        $this->columnAllSearch = [1, 2];
        $this->columnSearchSelect = [
            [
                'column' => 2,
                'data' => ServiceGroup::asSelectArray(),
            ]
        ];

    }
    protected function setCustomColumns(): void
    {
        $this->customColumns = config('datatable_columns.services', []);
    }

    protected function setCustomEditColumns(): void
    {
        $this->customEditColumns = [
            'action' => $this->view['action'],
            'icon' => $this->view['image'],
            'group' => $this->view['group'],
        ];
    }

    protected function setCustomAddColumns(): void
    {
        $this->customAddColumns = [
            'action' => $this->view['action'],
        ];
    }

    protected function setCustomRawColumns(): void
    {
        $this->customRawColumns = [
            'action',
            'group',
            'icon',
        ];
    }

    public function setCustomFilterColumns(): void
    {
        $this->customFilterColumns = [
            //
        ];
    }
}
