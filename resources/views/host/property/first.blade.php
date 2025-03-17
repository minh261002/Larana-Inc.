<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="url-home" content="{{ url('/') }}" />
    <title>
        Thêm căn nhà đầu tiên của bạn
    </title>
    <!-- CSS files -->
    <link href="{{ asset('admin/css/tabler.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/tabler-payments.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/demo.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/icons/tabler-icons-filled.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/icons/tabler-icons.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('admin/css/jquery-ui.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    @stack('styles')

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>

</head>

<body>
    <script src="{{ asset('admin/js/demo-theme.min.js?1692870487') }}"></script>

    <div class="page bg-white">
        <header class="navbar navbar-expand-md d-print-none shadow-none fixed-top navbar-light bg-white">
            <div class="container-xl">
                <div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('admin/images/logo.png') }}" class="img-fluid" width="150" />
                    </a>
                </div>
            </div>
        </header>

        <div class="my-100px">
            <form action="{{ route('host.property.store.first') }}" class="container" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Thông tin chỗ ở đầu tiên của bạn
                                </h3>
                            </div>


                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="name" class="form-label">Tên chỗ ở</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ old('name') }}">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="tagline" class="form-label">Tiêu đề</label>
                                        <input type="text" name="tagline" id="tagline" class="form-control"
                                            value="{{ old('tagline') }}">
                                    </div>

                                    <div class="col-12 form-group mb-3">
                                        @include('components.pick-address', [
                                            'label' => 'Địa chỉ cụ thể',
                                            'name' => 'address',
                                            'value' => old('address'),
                                        ])
                                        <input type="hidden" name="lat" value="{{ old('lat') }}">
                                        <input type="hidden" name="lng" value="{{ old('lng') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="price" class="form-label">Giá cho thuê </label>
                                        <input type="number" name="price" id="price" class="form-control"
                                            value="{{ old('price') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="sale_price" class="form-label">Giá khuyến mãi </label>
                                        <input type="number" name="sale_price" id="sale_price" class="form-control"
                                            value="{{ old('sale_price') }}">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="area" class="form-label">Diện tích</label>
                                        <input type="number" name="area" id="area" class="form-control"
                                            value="{{ old('area') }}">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="bedrooms" class="form-label">Phòng ngủ</label>
                                        <input type="number" name="bedrooms" id="bedrooms" class="form-control"
                                            value="{{ old('bedrooms') }}">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="bathrooms" class="form-label">Phòng tắm</label>
                                        <input type="number" name="bathrooms" id="bathrooms" class="form-control"
                                            value="{{ old('bathrooms') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="form-label">
                                            Mô tả
                                        </label>

                                        <textarea class="ck-editor" name="description" id="description">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Tiện ích
                                </h3>
                            </div>

                            <div class="card-body">
                                @foreach ($amenities as $key => $amenity)
                                    <h2>
                                        {{ \App\Enums\Amenity\AmenityGroup::getDescription($key) }}
                                    </h2>
                                    @foreach ($amenity as $item)
                                        <label class="form-check">
                                            <input class="form-check-input"
                                                name="amenities[{{ $key }}][{{ $item->id }}]"
                                                type="checkbox">
                                            <span class="form-check-label">
                                                <img src="{{ $item->icon }}" alt="{{ $item->name }}"
                                                    style="width: 20px; height: 20px;">
                                                {{ $item->name }}
                                            </span>
                                        </label>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Dịch vụ
                                </h3>
                            </div>

                            <div class="card-body">
                                @foreach ($services as $key => $service)
                                    <h2>
                                        {{ \App\Enums\Service\ServiceGroup::getDescription($key) }}
                                    </h2>
                                    @foreach ($service as $item)
                                        <label class="form-check">
                                            <input class="form-check-input"
                                                name="services[{{ $key }}][{{ $item->id }}]"
                                                type="checkbox">
                                            <span class="form-check-label">
                                                <img src="{{ $item->icon }}" alt="{{ $item->name }}"
                                                    style="width: 20px; height: 20px;">
                                                {{ $item->name }}
                                            </span>
                                        </label>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

                        <div class="card mt-5">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h2 class="card-title mb-0">Bộ sưu tập ảnh</h2>
                                <div class="upload-album"><a href="" class="upload-picture">Tải lên</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="col-lg-12">
                                    @if (!isset($gallery) || count($gallery) == 0)
                                        <div class="click-to-upload">
                                            <div class="icon">
                                                <a href="" class="upload-picture">
                                                    <svg style="width:80px;height:80px;fill: #d3dbe2;margin-bottom: 10px;"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80">
                                                        <path
                                                            d="M80 57.6l-4-18.7v-23.9c0-1.1-.9-2-2-2h-3.5l-1.1-5.4c-.3-1.1-1.4-1.8-2.4-1.6l-32.6 7h-27.4c-1.1 0-2 .9-2 2v4.3l-3.4.7c-1.1.2-1.8 1.3-1.5 2.4l5 23.4v20.2c0 1.1.9 2 2 2h2.7l.9 4.4c.2.9 1 1.6 2 1.6h.4l27.9-6h33c1.1 0 2-.9 2-2v-5.5l2.4-.5c1.1-.2 1.8-1.3 1.6-2.4zm-75-21.5l-3-14.1 3-.6v14.7zm62.4-28.1l1.1 5h-24.5l23.4-5zm-54.8 64l-.8-4h19.6l-18.8 4zm37.7-6h-43.3v-51h67v51h-23.7zm25.7-7.5v-9.9l2 9.4-2 .5zm-52-21.5c-2.8 0-5-2.2-5-5s2.2-5 5-5 5 2.2 5 5-2.2 5-5 5zm0-8c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3zm-13-10v43h59v-43h-59zm57 2v24.1l-12.8-12.8c-3-3-7.9-3-11 0l-13.3 13.2-.1-.1c-1.1-1.1-2.5-1.7-4.1-1.7-1.5 0-3 .6-4.1 1.7l-9.6 9.8v-34.2h55zm-55 39v-2l11.1-11.2c1.4-1.4 3.9-1.4 5.3 0l9.7 9.7c-5.2 1.3-9 2.4-9.4 2.5l-3.7 1h-13zm55 0h-34.2c7.1-2 23.2-5.9 33-5.9l1.2-.1v6zm-1.3-7.9c-7.2 0-17.4 2-25.3 3.9l-9.1-9.1 13.3-13.3c2.2-2.2 5.9-2.2 8.1 0l14.3 14.3v4.1l-1.3.1z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="small-text">
                                                <p>Click vào nút "Tải lên" để thêm ảnh</p>
                                            </div>
                                        </div>
                                    @endif
                                    @php
                                        $gallery = old('product.gallery') ?? ($product->gallery ?? []);
                                    @endphp
                                    <div class="upload-list {{ isset($gallery) && count($gallery) ? '' : 'hidden' }}">
                                        <ul id="sortable" class="clearfix data-album sortui ui-sortable">
                                            @if (isset($gallery) && count($gallery))
                                                @foreach ($gallery as $key => $val)
                                                    <li class="ui-state-default">
                                                        <div class="thumb">
                                                            <span class="span image img-scaledown">
                                                                <img src="{{ $val }}"
                                                                    alt="{{ $val }}">
                                                                <input type="hidden" name="gallery[]"
                                                                    value="{{ $val }}">
                                                            </span>
                                                            <button class="delete-image">
                                                                <i class="ti ti-trash"></i>
                                                            </button>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>

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
                                <a href="{{ route('host.home') }}" class="btn btn-secondary w-100">
                                    Quay lại
                                </a>
                                <button type="submit" class="btn btn-primary w-100">
                                    Thêm mới
                                </button>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <div class="card-title">
                                    Số khách
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="guests" class="form-label">Người lớn</label>
                                    <div class="input-group w-50">
                                        <button class="btn btn-outline-primary" type="button"
                                            onclick="changeValue('guests', -1)">-</button>
                                        <input type="text" class="form-control text-center" id="guests"
                                            value="1" readonly>
                                        <button class="btn btn-outline-primary" type="button"
                                            onclick="changeValue('guests', 1)">+</button>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="children" class="form-label">Trẻ em</label>
                                    <div class="input-group w-50">
                                        <button class="btn btn-outline-primary" type="button"
                                            onclick="changeValue('children', -1)">-</button>
                                        <input type="text" class="form-control text-center" id="children"
                                            value="0" readonly>
                                        <button class="btn btn-outline-primary" type="button"
                                            onclick="changeValue('children', 1)">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function changeValue(id, delta) {
                                let input = document.getElementById(id);
                                let value = parseInt(input.value) + delta;
                                if (value < 0) value = 0;
                                input.value = value;
                            }
                        </script>


                        <div class="card mt-3">
                            <div class="card-header">
                                <div class="card-title">
                                    Loại chỗ ở
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <select name="category_id" class="form-select select2">
                                        <option value="">Chọn</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Ảnh
                                </h3>
                            </div>

                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <span class="image img-cover image-target"><img class="w-100"
                                                src="{{ old('image') ? old('image') : asset('admin/images/not-found.jpg') }}"
                                                alt=""></span>
                                        <input type="hidden" name="image" value="{{ old('image') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        @include('client.layout.partials.footer')

        @include('components.modal-pick-address')
        @include('components.google-map-script')
    </div>

    <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('plugins/ckfinder/ckfinder.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.js') }}"></script>
    <script src="{{ asset('admin/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('admin/js/finder.js') }}"></script>
    <script src="{{ asset('admin/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('admin/js/demo.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('admin/js/setup.js') }}"></script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&libraries=places&language=vi&callback=initMaps">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.select2').select2({
            theme: 'bootstrap-5'
        });
    </script>
    <script>
        function initMaps() {
            try {
                if (typeof initMap === 'function') {
                    console.log("Calling initMap");
                    initMap();
                } else {
                    console.error("initMap is not defined");
                }

            } catch (error) {
                console.error("Error in initMaps:", error);
                window.location.reload();
            }
        }
    </script>
    @stack('scripts')
</body>

</html>
