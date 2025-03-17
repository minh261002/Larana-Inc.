@extends('admin.layout.master')
@section('title', 'Thêm tiện ích mới')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <div class="page-header d-print-none">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h3 class="card-title">
                        Quản lý tiện ích
                    </h3>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.amenity.index') }}">
                                    Quản lý tiện ích
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Thêm tiện ích mới
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Page body -->
        <div class="page-body">
            <form action="{{ route('admin.amenity.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Thông tin tiện ích
                                </h3>
                            </div>


                            <div class="card-body">
                                <div class="form-group mb-3 d-flex align-items-center justify-content-start gap-4">
                                    <div class="">
                                        <label for="icon" class="form-label">
                                            Icon
                                        </label>
                                        <div class="form-group"
                                            style="width: 50px; height: 50px; overflow: hidden; position: relative;">
                                            <span class="image img-cover image-target"><img class="w-100"
                                                    src="{{ old('icon') ? old('icon') : asset('admin/images/not-found.jpg') }}"
                                                    alt=""></span>
                                            <input type="hidden" name="icon" value="{{ old('icon') }}">
                                        </div>
                                    </div>
                                    <div class="w-100">
                                        <label for="name" class="form-label">
                                            Tên tiện ích
                                        </label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="group">Nhóm tiện ich</label>
                                    <select class="form-select select2" name="group" id="group">
                                        @foreach ($amenityGroups as $key => $amenityGroup)
                                            <option value="{{ $key }}">
                                                {{ $amenityGroup }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Thao tác
                                </h3>
                            </div>

                            <div class="card-body d-flex align-items-center justify-content-between gap-4">
                                <a href="{{ route('admin.amenity.index') }}" class="btn btn-secondary w-100">
                                    Quay lại
                                </a>

                                <button type="submit" class="btn btn-primary w-100">
                                    Thêm mới
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="{{ asset('admin/js/finder.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.select2').select2({
            theme: 'bootstrap-5',
            width: "100%",
        });
    </script>
@endpush
