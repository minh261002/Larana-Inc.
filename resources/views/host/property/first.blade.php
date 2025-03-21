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
    <link rel="stylesheet" href="{{ asset('admin/css/host.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/gh/lelinh014756/fui-toast-js@master/assets/css/toast@1.0.1/fuiToast.min.css">
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
    <div id="fui-toast"></div>

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
                                            <input class="form-check-input" name="amenities[{{ $item->id }}]"
                                                type="checkbox" value="{{ $item->id }}">
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
                                            <input class="form-check-input" name="services[{{ $item->id }}]"
                                                type="checkbox" value="{{ $item->id }}">
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
                                <button type="button" class="btn btn-primary" onclick="addImage()">Thêm ảnh</button>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <img src="{{ asset('admin/images/not-found.jpg') }}" alt=""
                                            class="w-100">
                                        <input type="file" name="images[]" class="form-control" hidden>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
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
                                            name="guests" value="1" readonly>
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
                                            name="children" value="0" readonly>
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
                                        <label for="image" class="form-label">
                                            <img class="w-100"
                                                src="{{ old('image') ? old(key: 'image') : asset('admin/images/not-found.jpg') }}"
                                                alt="" id="preview-image">
                                        </label>
                                        <input type="file" hidden name="image" id="image"
                                            value="{{ old('image') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
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

    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/gh/lelinh014756/fui-toast-js@master/assets/js/toast@1.0.1/fuiToast.min.js"></script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&libraries=places&language=vi&callback=initMaps">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                width: '100%',
                theme: 'bootstrap-5'
            });
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
    @if (session('success'))
        <script>
            FuiToast.success('{{ session('success') }}');
        </script>
    @endif

    @if (session('error'))
        <script>
            FuiToast.error('{{ session('error') }}');
        </script>
    @endif

    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                FuiToast.error('{{ $error }}');
            @endforeach
        </script>
    @endif

    <script>
        $(document).ready(function() {
            //preview image
            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        })

        function addImage() {
            let html = `
                    <div class="col-md-3 mb-3">
                        <img src="{{ asset('admin/images/not-found.jpg') }}" alt="" class="w-100">
                        <input type="file" name="images[]" class="form-control" hidden>
                    </div>
                `;
            $('.card-body .row').append(html);
        }
    </script>

    @stack('scripts')
</body>

</html>
