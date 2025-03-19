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
                            </div>

                            <div class="card-body">

                                <div class="fui-upload-img-list">
                                    <div class="image-wrap">
                                        <ul class="image-list">
                                            <li class="image-item upload-box">
                                                <div class="wrapImgResize imgSquare">
                                                    <label htmlFor="uploadImages">
                                                        <input type="file" id="uploadImages" accept="image/*"
                                                            multiple hidden />
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="none" viewBox="0 0 24 24">
                                                            <path fill="currentColor" fill-rule="evenodd"
                                                                d="M8.999 10.04a1 1 0 01-.946 1.052c-.752.04-1.349.089-1.814.138-.626.066-1.006.45-1.07 1.003C5.08 13.027 5 14.228 5 16c0 1.772.079 2.973.17 3.767.063.554.442.937 1.067 1.003C7.33 20.885 9.139 21 12 21c2.86 0 4.67-.115 5.763-.23.625-.066 1.004-.45 1.067-1.003.091-.794.17-1.995.17-3.767 0-1.772-.079-2.973-.17-3.767-.063-.553-.443-.937-1.068-1.003a35.394 35.394 0 00-1.815-.138 1 1 0 01.106-1.997c.783.041 1.414.093 1.918.146 1.485.157 2.669 1.21 2.846 2.765.102.886.183 2.165.183 3.994 0 1.828-.081 3.108-.183 3.994-.177 1.554-1.358 2.608-2.844 2.765-1.181.124-3.062.241-5.973.241-2.91 0-4.792-.117-5.973-.241-1.485-.157-2.667-1.21-2.844-2.765C3.08 19.108 3 17.828 3 16c0-1.829.081-3.108.183-3.994.177-1.555 1.361-2.608 2.846-2.765a37.358 37.358 0 011.918-.146 1 1 0 011.052.945z"
                                                                clip-rule="evenodd"></path>
                                                            <path fill="currentColor" fill-rule="evenodd"
                                                                d="M9.207 6.207a1 1 0 01-1.414-1.414l3.5-3.5a1 1 0 011.414 0l3.5 3.5a1 1 0 01-1.414 1.414L13 4.414V14a1 1 0 11-2 0V4.414L9.207 6.207z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <h3>Upload</h3>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
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
                                        {{-- <span class="image img-cover image-target"><img class="w-100"
                                                src="{{ old('image') ? old('image') : asset('admin/images/not-found.jpg') }}"
                                                alt=""></span>
                                        <input type="hidden" name="image" value="{{ old('image') }}"> --}}

                                        <label for="fui-input-upload" class="fui-upload">
                                            <div class="upload-icon">
                                                <img src="https://i.ibb.co/5cQkzZN/img-upload.png" alt="" />
                                            </div>
                                            <input type="file" name="fui-input-upload" multiple hidden
                                                accept="image/*" id="fui-input-upload" />
                                            <span class="fui-upload-text">Tải ảnh lên</span>
                                        </label>
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
        $('.select2').select2({
            theme: 'bootstrap-5'
        });

        /* ================ Function Common ================ */
        function createId() {
            function S4() {
                return ((1 + Math.random()) * 0x10000 || 0).toString(16).substring(1);
            }
            return `${
    S4() + S4()
  }-${S4()}-${S4()}-${S4()}-${S4()}${S4()}${S4()}${Date.now()}`;
        }

        function getParent(el, parentSelector) {
            let element = el;

            if (!element) {
                return element;
            }

            while (element.parentElement) {
                if (element.parentElement.matches(parentSelector)) {
                    return element.parentElement;
                }
                element = element.parentElement;
            }
            return element;
        }

        function clearObjUrlList(files) {
            if (files.length) {
                files.forEach((file) => {
                    URL.revokeObjectURL(file.url || file);
                });
            }
        }

        function isFunction(func) {
            return typeof func === "function";
        }

        const setOverflowBody = (status) => {
            const {
                body
            } = document;
            if (status) {
                body.style.overflow = "hidden";
                return status;
            }
            body.style.removeProperty("overflow");
            return status;
        };

        function setHeadersXhr(headers, xhr) {
            const headersData = Object.keys(headers ?? {});
            if (headersData.length) {
                headersData.forEach((key) => {
                    xhr.setRequestHeader(key, headers[key]);
                });
            }
            return true;
        }

        /* ================ End Function Common ================ */
        //
        //
        //
        //
        //
        //
        //
        //
        //
        /* ================ HTML Custom ================ */
        const htmlImg = (props) => {
            const {
                url,
                title,
                id,
                type
            } = props;
            const rejectBtn = {
                delete: `
    <li class="img-delete">
      <svg
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
        class="delete-icon"
      >
        <path
          fill-rule="evenodd"
          clip-rule="evenodd"
          d="M3.23918 13.1961C3.11542 12.5773 3.58871 11.9999 4.21976 11.9999H19.7802C20.4112 11.9999 20.8845 12.5773 20.7607 13.1961L19.4823 19.5883C19.2018 20.9906 17.9706 21.9999 16.5405 21.9999H7.45937C6.02933 21.9999 4.79808 20.9906 4.51763 19.5883L3.23918 13.1961ZM13 14.9999C13 14.4477 13.4477 13.9999 14 13.9999C14.5523 13.9999 15 14.4477 15 14.9999V18.9999C15 19.5522 14.5523 19.9999 14 19.9999C13.4477 19.9999 13 19.5522 13 18.9999V14.9999ZM9.99999 13.9999C9.4477 13.9999 8.99999 14.4477 8.99999 14.9999V18.9999C8.99999 19.5522 9.4477 19.9999 9.99999 19.9999C10.5523 19.9999 11 19.5522 11 18.9999V14.9999C11 14.4477 10.5523 13.9999 9.99999 13.9999Z"
          fill="white"
        />
        <path
          d="M2 9C2 8.44772 2.44772 8 3 8H21C21.5523 8 22 8.44772 22 9C22 9.55228 21.5523 10 21 10H3C2.44772 10 2 9.55228 2 9Z"
          fill="white"
        />
        <path
          d="M10.7071 3.70711C11.0976 3.31658 11.0976 2.68342 10.7071 2.29289C10.3166 1.90237 9.68342 1.90237 9.29289 2.29289L7.29289 4.29289C6.90237 4.68342 6.90237 5.31658 7.29289 5.70711C7.68342 6.09763 8.31658 6.09763 8.70711 5.70711L10.7071 3.70711Z"
          fill="white"
        />
        <path
          d="M13.2929 3.70711C12.9024 3.31658 12.9024 2.68342 13.2929 2.29289C13.6834 1.90237 14.3166 1.90237 14.7071 2.29289L16.7071 4.29289C17.0976 4.68342 17.0976 5.31658 16.7071 5.70711C16.3166 6.09763 15.6834 6.09763 15.2929 5.70711L13.2929 3.70711Z"
          fill="white"
        />
      </svg>
    </li>
    `,
                cancel: `
    <li class="img-cancel">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M367.2 412.5L99.5 144.8C77.1 176.1 64 214.5 64 256c0 106 86 192 192 192c41.5 0 79.9-13.1 111.2-35.5zm45.3-45.3C434.9 335.9 448 297.5 448 256c0-106-86-192-192-192c-41.5 0-79.9 13.1-111.2 35.5L412.5 367.2zM512 256c0 141.4-114.6 256-256 256S0 397.4 0 256S114.6 0 256 0S512 114.6 512 256z"/></svg>
    </li>
    `,
            };

            return `
  <li key=${id} class="image-item img-box">
    <div class="wrapImgResize imgSquare">
      <img
        src=${url}
        alt=${title || "image"}
      />
    </div>
    <div class="img-options">
      <ul>
        <li class="img-view">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            fill="none"
            viewBox="0 0 24 24"
          >
            <path
              fill="currentColor"
              fill-rule="evenodd"
              d="M12 18c4.125 0 7.06-2.592 8.777-4.751a1.968 1.968 0 000-2.498C19.06 8.592 16.125 6 12 6c-4.125 0-7.06 2.592-8.777 4.751a1.968 1.968 0 000 2.498C4.94 15.408 7.875 18 12 18zm10.342-3.506a3.967 3.967 0 000-4.988C20.474 7.158 17.026 4 12 4 6.973 4 3.526 7.158 1.658 9.506a3.967 3.967 0 000 4.988C3.526 16.842 6.973 20 12 20c5.026 0 8.474-3.158 10.342-5.506z"
              clip-rule="evenodd"
            ></path>
            <path
              fill="currentColor"
              fill-rule="evenodd"
              d="M14 12a2 2 0 11-3.998-.085A1.5 1.5 0 0012 10.5a1.5 1.5 0 00-.085-.498L12 10a2 2 0 012 2zm2 0a4 4 0 11-8 0 4 4 0 018 0z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </li>
        ${rejectBtn[type]}
      </ul>
    </div>
  </li>
`;
        };

        const htmlModalViewImg = ({
            title,
            url
        }) => `
  <div class="modal modal-view-img" onclick="(function(event){return event.stopPropagation();})(event);">
    <div class="modal-inner">
      <div class="modal-close">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M393.4 41.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3L269.3 256 438.6 425.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 301.3 54.6 470.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 9.4 86.6C-3.1 74.1-3.1 53.9 9.4 41.4s32.8-12.5 45.3 0L224 210.7 393.4 41.4z"/></svg>
      </div>
      <h3>${title}</h3>
      <img src=${url} alt=${title} />
    </div>
  </div>
`;

        const htmlProgressingFile = `
  <div class="progress-upload-box">
    <h4 class="progress-upload-text">
      Uploading... <span>0%</span>
    </h4>
    <div class="progress-upload-bar">
      <span></span>
    </div>
  </div>
`;

        const htmlProgressedFile = `
    <div class="progress-upload-completed">
      <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"> <circle cx="12" cy="12" r="10" fill="white"/> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.7071 9.70711C18.0976 9.31658 18.0976 8.68342 17.7071 8.29289C17.3166 7.90237 16.6834 7.90237 16.2929 8.29289L11 13.5858L8.70711 11.2929C8.31658 10.9024 7.68342 10.9024 7.29289 11.2929C6.90237 11.6834 6.90237 12.3166 7.29289 12.7071L10.2929 15.7071C10.6834 16.0976 11.3166 16.0976 11.7071 15.7071L17.7071 9.70711Z" fill="currentColor"/> </svg>
      <h4 class="progress-upload-text">
        Completed
      </h4>
    </div>
`;
        /* ================ End HTML Custom ================ */
        //
        //
        //
        //
        //
        //
        //
        //
        //
        /* ================ Modal Classes ================ */

        class Modal {
            #modalWrap = document.createElement("div");

            #title;

            #desc;

            #btnList;

            onClose;

            constructor(props) {
                const {
                    btnList,
                    title,
                    desc = ""
                } = props ?? {};
                this.#title = title;
                this.#desc = desc;
                this.#btnList = btnList;
            }

            open = () => {
                const htmlModal = `
    <div class="modal" onclick="(function(event){return event.stopPropagation();})(event);">
      <div class="modal-inner">
        <h3>${this.#title}</h3>
        ${(this.#desc && `<p>${this.#desc}</p>`) || ""}
        <div class="modal-btn">
        </div>
      </div>
    </div>
  `;
                this.#modalWrap.className = "overlay modal-wrap";
                this.#modalWrap.innerHTML = htmlModal;
                document.body.append(this.#modalWrap);
                const btnListEl = this.#renderBtn(this.#modalWrap);
                // destroy modal khi click overlay
                this.#modalWrap.addEventListener("click", () => {
                    this.destroy();
                    if (isFunction(this.onClose)) {
                        this.onClose();
                    }
                });
                return {
                    btnListEl,
                };
            };

            destroy = () => {
                document.body.removeChild(this.#modalWrap);
                return this;
            };

            #renderBtn = (mainEL) => {
                const btnWrapEl = mainEL.querySelector(".modal-btn");
                if (this.#btnList.length) {
                    this.#btnList.forEach((btn) => {
                        const {
                            title
                        } = btn;
                        const className = btn.class;
                        const btnEl = document.createElement("button");
                        btnEl.className = className;
                        btnEl.innerText = title;
                        btnWrapEl?.append(btnEl);
                    });
                }
                return btnWrapEl?.children;
            };
        }
        /* ================ End Modal Classes ================ */
        //
        //
        //
        //
        //
        //
        //
        //
        //
        /* ================ Progress ================ */
        class Progress {
            // Property
            #imgItemEl;

            #progressBox;

            #progressTextCount;

            #progressBar;

            #$ = document.querySelector.bind(document);

            constructor({
                id
            }) {
                this.#imgItemEl = this.#$(`[key='${id}']`);

                this.build();
            }

            build = () => {
                this.#imgItemEl?.insertAdjacentHTML("afterbegin", htmlProgressingFile);

                const progressBox = this.#imgItemEl?.querySelector(".progress-upload-box");

                this.#progressBox = progressBox;

                this.#progressTextCount = progressBox?.querySelector(
                    ".progress-upload-text span"
                );

                this.#progressBar = progressBox?.querySelector(".progress-upload-bar span");

                this.build = () => {
                    console.log(this.#progressBox);
                    return this;
                };
                return this;
            };

            running = ({
                percent
            }) => {
                this.#progressTextCount.innerText = `${percent}%`;
                this.#progressBar.style.width = `${percent}%`;
                return this;
            };

            completed = () => {
                this.#progressBox.innerHTML = htmlProgressedFile;
            };
        }
        /* ================ End Progress ================ */
        //
        //
        //
        //
        //
        //
        //
        //
        //
        /* ================ Img View Classes ================ */
        class ImgView {
            #modalWrap = document.createElement("div");

            #timeOut;

            #impactEl;

            #modalInnerEl;

            constructor({
                impactEl
            }) {
                this.#impactEl = impactEl;
            }

            setShowPosition = (mainEl) => {
                const topSize = 100;
                const modalWidth = 540;
                const modalBox = mainEl.querySelector(".modal-view-img");
                this.#modalInnerEl = modalBox;

                const coordinates = this.#impactEl?.getBoundingClientRect();

                const topOffset =
                    (coordinates?.top ?? 0) + (this.#impactEl.offsetHeight ?? 0) / 2 - 100;
                const leftOffset =
                    (coordinates?.left ?? 0) +
                    (this.#impactEl.offsetWidth ?? 0) / 2 -
                    (window.innerWidth - 520) / 2;

                modalBox?.setAttribute(
                    "style",
                    `transform-origin: ${leftOffset}px ${topOffset}px; width: ${modalWidth}px; max-width: ${modalWidth}px; top: ${topSize}px`
                );
                this.#timeOut = setTimeout(() => {
                    modalBox?.classList.add("is-open");
                }, 100);
            };

            open = ({
                title,
                url
            }) => {
                this.#modalWrap.className = "overlay type2";
                this.#modalWrap.innerHTML = htmlModalViewImg({
                    title,
                    url
                });
                this.setShowPosition(this.#modalWrap);

                const btnModalClose = this.#modalWrap.querySelector(".modal-close");

                btnModalClose?.addEventListener("click", this.destroy);
                this.#modalWrap.addEventListener("click", this.destroy);

                document.body.append(this.#modalWrap);

                setOverflowBody(true);
            };

            destroy = () => {
                this.#modalInnerEl?.classList.remove("is-open");
                if (this.#timeOut) {
                    clearTimeout(this.#timeOut);
                }
                this.#timeOut = setTimeout(() => {
                    document.body.removeChild(this.#modalWrap);
                }, 400);
                setOverflowBody(false);
                return this;
            };
        }
        /* ================ End Img View Classes ================ */
        //
        //
        //
        //
        //
        //
        //
        //
        //
        /* ================ File Control Classes ================ */
        class FileControl {
            // Property
            #$$ = document.querySelector.bind(document);

            #mainEl;

            mainSelector;

            constructor(mainSelector) {
                this.#mainEl = this.#$$(`${mainSelector}`);
                this.mainSelector = mainSelector;
            }

            // Getter
            get mainElData() {
                return this.#mainEl;
            }

            // Method
            gettingSizeFile(fileSize, decimals = 2) {
                if (typeof fileSize === "number") {
                    const k = 1024;
                    const dm = decimals < 0 ? 0 : decimals;
                    const sizes = ["Bytes", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"];

                    const i = Math.floor(Math.log(fileSize) / Math.log(k));

                    return `${parseFloat((fileSize / k ** i).toFixed(dm))} ${sizes[i]}`;
                }
                return "0 Bytes";
            }
        }
        /* ================ End File Control Classes ================ */
        //
        //
        //
        //
        //
        //
        //
        //
        //
        /* ================ Img Client Classes ================ */
        class ImgClient extends FileControl {
            // Property
            #files = [];

            #uploadBoxEl;

            #inputEl = this.#setSelector("input[type='file']");

            #imgListEl;

            #btnEl = this.#setSelector("button");

            uploaded;

            canceled;

            constructor(mainSelector, selectorList) {
                const {
                    uploadBoxSlt = ".image-item.upload-box label",
                        imgListSlt = ".image-list",
                } = selectorList || {};
                super(mainSelector);
                this.#uploadBoxEl = this.#setSelector(uploadBoxSlt);
                this.#imgListEl = this.#setSelector(imgListSlt);
                this.init();
            }

            // Getter
            get elementList() {
                return {
                    inputEl: this.#inputEl,
                    imgListEl: this.#imgListEl,
                    uploadBoxEl: this.#uploadBoxEl,
                };
            }

            // Method
            #setSelector(selector) {
                return this.mainElData?.querySelector(selector);
            }

            resetFiles = () => {
                this.#files = [];
                return this;
            };

            #renderImages(files) {
                if (files.length) {
                    const filesHtml = [];
                    Array.from(files).forEach((file) => {
                        const url = URL.createObjectURL(file);
                        const id = createId();
                        this.#files.push({
                            url,
                            file,
                            id,
                        });
                        filesHtml.push(htmlImg({
                            url,
                            title: file.name,
                            id,
                            type: "cancel"
                        }));
                    });
                    this.#imgListEl?.insertAdjacentHTML("beforeend", filesHtml.join(""));
                    Array.from(
                        this.#imgListEl?.querySelectorAll(".image-item.img-box")
                    ).forEach((el, index, arr) => {
                        const arrLength = arr.length;
                        if (arrLength - index <= files.length) {
                            const removeImgBtn = el.querySelector(".img-cancel");
                            removeImgBtn?.addEventListener("click", this.#onCancel);
                            const viewImgBtn = el.querySelector(".img-view");
                            viewImgBtn?.addEventListener("click", (e) =>
                                ImgClient.viewModalImg(e, this.#files)
                            );
                        }
                    });
                    if (isFunction(this.uploaded) && !this.#btnEl) {
                        const modal = new Modal({
                            title: "Cập nhật ảnh",
                            desc: "Bạn có chắc chắn muốn tải ảnh lên?",
                            btnList: [{
                                    title: "Hủy",
                                    class: "btn1 btn-destroy",
                                },
                                {
                                    title: "Gửi",
                                    class: "btn1 btn-send",
                                },
                            ],
                        });
                        const {
                            btnListEl
                        } = modal.open();
                        if (btnListEl?.length) {
                            const filesData = this.#files;
                            const clearImgAndFile = () => {
                                this.removeImgElList(filesData);
                                this.resetFiles();
                            };
                            Array.from(btnListEl).forEach((btnEl, index) => {
                                btnEl.addEventListener("click", () => {
                                    modal.destroy();
                                    if (index === 1) {
                                        this.uploaded({
                                            files: filesData
                                        });
                                    } else {
                                        clearImgAndFile();
                                    }
                                });
                            });
                            modal.onClose = () => {
                                clearImgAndFile();
                            };
                        }
                    }
                }
            }

            static viewModalImg = (e, files) => {
                const currTarget = e.currentTarget;
                const imgItemEl = getParent(currTarget, ".image-item");
                const key = imgItemEl?.getAttribute("key");

                const dataItem = files.find((file) => file.id === key);
                const modalImg = new ImgView({
                    impactEl: imgItemEl
                });
                modalImg.open({
                    url: dataItem?.url ?? "",
                    title: dataItem?.file?.name || dataItem?.name,
                });
                return this;
            };

            removeImgEl = (e) => {
                const imgEl = getParent(e.currentTarget, ".image-item.img-box");

                const key = imgEl?.getAttribute("key");

                if (imgEl) {
                    this.#imgListEl?.removeChild(imgEl);
                }
                return {
                    key,
                };
            };

            removeImgElList = (files) => {
                const imagesEl = this.#imgListEl?.children;
                if (files.length) {
                    files.forEach((file) => {
                        Array.from(imagesEl ?? []).forEach((imgEl) => {
                            const key = imgEl.getAttribute("key");
                            if (key === file.id) {
                                this.#imgListEl?.removeChild(imgEl);
                            }
                        });
                    });
                }
            };

            #onCancel = (e) => {
                const {
                    key
                } = this.removeImgEl(e);

                const fileCancel = this.#files.find((item) => item.id === key);
                const fileRemaining = this.#files.filter((item) => item.id !== key);
                this.#files = fileRemaining;
                if (fileRemaining.length === 0) {
                    this.#btnEl?.classList.add("disabled");
                }

                if (isFunction(this.canceled)) {
                    this.canceled({
                        files: this.#files,
                        fileCancel
                    });
                }
            };

            #handleChange = (e) => {
                const {
                    files
                } = e.target;
                this.#btnEl?.classList.remove("disabled");
                if (files) {
                    this.#renderImages(files);
                }
                e.target.value = "";
            };

            #changeUiDragging = (status) => {
                const imgItemEL = getParent(this.#uploadBoxEl, ".image-item.upload-box");
                return imgItemEL?.classList.toggle("isDragover", status);
            };

            #dragleaveImg = (e) => {
                e.stopPropagation();
                e.preventDefault();
                this.#changeUiDragging(false);
                return true;
            };

            #dragoverImg = (e) => {
                e.stopPropagation();
                e.preventDefault();
                this.#changeUiDragging(true);
                e.dataTransfer.dropEffect = "copy";
                return true;
            };

            dropImg = (e) => {
                e.stopPropagation();
                e.preventDefault();
                this.#handleChange({
                    target: e?.dataTransfer
                });
                this.#changeUiDragging(false);
                return true;
            };

            disabledControl = (status) => {
                this.#btnEl?.classList.toggle("disabled", status);
                this.#uploadBoxEl?.classList.toggle("disabled", status);
            };

            init = () => {
                this.#inputEl?.addEventListener("change", this.#handleChange);
                this.#uploadBoxEl?.addEventListener("dragleave", this.#dragleaveImg);
                this.#uploadBoxEl?.addEventListener("dragover", this.#dragoverImg);
                this.#uploadBoxEl?.addEventListener("drop", this.dropImg);
                // Xử lý khi có button
                if (this.#btnEl) {
                    this.#btnEl.classList.add("disabled");
                    this.#btnEl.addEventListener("click", () => {
                        if (!this.#files.length) {
                            return;
                        }
                        if (typeof this.uploaded === "function") {
                            this.uploaded({
                                files: this.#files
                            });
                        }
                    });
                    this.init = (callback) => {
                        if (typeof callback === "function") {
                            callback(this);
                        }
                        return this;
                    };
                }
                return this;
            };
        }
        /* ================ End Img Client Classes ================ */
        //
        //
        //
        //
        //
        //
        //
        //
        //
        /* ================ Img Server Classes ================ */
        class ImgServer {
            // Property
            removing;

            #files = [];

            #fileListEl;

            constructor(fileListEl) {
                this.#fileListEl = fileListEl;
            }

            // Method

            get fileList() {
                return this.#files;
            }

            getFile(id) {
                return this.#files.find((file) => file.id === id);
            }

            renderHtml = (files) => {
                if (files.length) {
                    const filesHtml = [];
                    files.forEach((file) => {
                        const {
                            url
                        } = file;
                        const {
                            id
                        } = file;
                        filesHtml.push(
                            htmlImg({
                                url,
                                title: file.name ?? "",
                                id,
                                type: "delete"
                            })
                        );
                    });

                    this.#fileListEl?.insertAdjacentHTML("beforeend", filesHtml.join(""));

                    [
                        ...(this.#fileListEl?.querySelectorAll(".image-item.img-box") ?? []),
                    ].forEach((el, index, arr) => {
                        const key = el?.getAttribute("key");
                        const arrLength = arr.length;

                        if (arrLength - index <= files.length) {
                            const removeImgEl = el?.querySelector(".img-delete");
                            removeImgEl?.addEventListener("click", (e) => {
                                const currTarget = e.currentTarget;
                                this.onRemove({
                                    ...e,
                                    currentTarget: currTarget
                                }, key);
                            });

                            const viewImgBtn = el?.querySelector(".img-view");
                            viewImgBtn?.addEventListener("click", (e) =>
                                ImgClient.viewModalImg(e, this.#files)
                            );
                        }
                    });
                }
            };

            addFiles(files) {
                this.#files = [...this.#files, ...files];
                this.renderHtml(files);
            }

            removeFile(id) {
                this.#files = this.#files.filter((file) => file.id !== id);
                return this;
            }

            onRemove = (e, key) => {
                const target = e.currentTarget;
                const modal = new Modal({
                    title: "Xóa ảnh",
                    desc: "Đây là ảnh đã được lưu trữ. Bạn có chắc chắn muốn xóa ảnh ?",
                    btnList: [{
                            title: "Hủy",
                            class: "btn1 btn-destroy",
                        },
                        {
                            title: "Xóa",
                            class: "btn1 btn-remove",
                        },
                    ],
                });
                const {
                    btnListEl
                } = modal.open();

                if (btnListEl?.length) {
                    Array.from(btnListEl).forEach((btnEl, index) => {
                        btnEl.addEventListener("click", () => {
                            modal.destroy();
                            if (index === 1 && typeof this.removing === "function") {
                                this.removing({
                                    ...e,
                                    currentTarget: target
                                }, key);
                            }
                        });
                    });
                }
            };

            initData(files) {
                if (files.length) {
                    this.addFiles(files);
                }
                return this;
            }

            updateData(files) {
                if (files.length) {
                    setTimeout(() => {
                        clearObjUrlList(files);
                        this.addFiles(files);
                    }, 300);
                }
            }
        }
        /* ================ End Img Server Classes ================ */
        //
        //
        //
        //
        //
        //
        //
        //
        //
        /* ================ App Function ================ */
        const uploadImagesControl = ({
            mainSelector,
            dataInit,
            apiUpload,
            apiRemove,
            onUploaded,
            onCanceled,
        }) => {
            const imgClient = new ImgClient(mainSelector);

            const imgServer = new ImgServer(imgClient.elementList.imgListEl);

            /* ======================= Xử lý ảnh hiện tại ======================= */
            imgClient.uploaded = (data) => {
                // Callback lấy data
                if (isFunction(onUploaded)) {
                    onUploaded(data);
                }

                // Xử lý Api upload images
                if (apiUpload) {
                    const formdata = new FormData();
                    const {
                        onStartUpload,
                        getPromise,
                        api,
                        method,
                        headers
                    } =
                    apiUpload || {};

                    imgClient.disabledControl(true);

                    if (isFunction(onStartUpload)) {
                        onStartUpload(data);
                    }

                    // Promise
                    const fetchUpload = Promise.all(
                        [...(data.files ?? [])].map(async (item) => {
                            const {
                                file
                            } = item;
                            const fileId = item.id;
                            return new Promise((resolve, reject) => {
                                formdata.append(fileId, file);
                                const progressUpload = new Progress({
                                    id: fileId
                                });
                                const xhr = new XMLHttpRequest();
                                xhr.upload.addEventListener(
                                    "progress",
                                    (e) => {
                                        const percent = Math.round((e.loaded / e.total) *
                                            100);
                                        progressUpload.running({
                                            percent
                                        });
                                    },
                                    true
                                );
                                xhr.addEventListener(
                                    "load",
                                    () => {
                                        progressUpload.completed();
                                        return resolve(JSON.parse('"complete"' || xhr
                                            .responseText));
                                    },
                                    true
                                );
                                xhr.addEventListener(
                                    "error",
                                    (error) => {
                                        console.error(error);
                                        return reject(xhr.responseText);
                                    },
                                    true
                                );
                                // xhr.addEventListener('abort', abortHandler, false);
                                xhr.open(method ?? "POST", api, true);
                                setHeadersXhr(headers, xhr);
                                xhr.send(formdata);
                            });
                        })
                    );

                    if (isFunction(getPromise)) {
                        getPromise(fetchUpload);
                    }

                    fetchUpload
                        .then((res) => {
                            setTimeout(() => {
                                imgClient.removeImgElList(data.files);
                                imgClient.resetFiles();
                            }, 300);
                            return res;
                        })
                        .catch((err) => {
                            console.error(err);
                        })
                        .finally(() => {
                            imgClient.disabledControl(false);
                        });
                    // End promise
                }
            };

            imgClient.canceled = (data) => {
                if (isFunction(onCanceled)) {
                    onCanceled(data);
                }
                console.log(data);
            };
            /* ======================= End Xử lý ảnh hiện tại ======================= */

            /* ======================= Xử lý ảnh bên phía server ======================= */
            if (dataInit) {
                imgServer.initData(dataInit);
            }

            if (apiRemove) {
                const {
                    api,
                    headers,
                    method,
                    callbackRemove,
                    getPromise
                } = apiRemove;

                imgServer.removing = (e, key) => {
                    const file = imgServer.getFile(key);

                    if (isFunction(callbackRemove)) {
                        callbackRemove(file);
                    }

                    // Promise
                    const fetchApiDelete = fetch(api, {
                            method: method ?? "POST",
                            body: method && !["POST", "PUT"].includes(method) ?
                                undefined :
                                JSON.stringify(file),
                            headers,
                        })
                        .then((res) => {
                            imgClient.removeImgEl(e);
                            imgServer.removeFile(key);
                            console.log(imgServer.fileList);
                            return res;
                        })
                        .catch((error) => {
                            console.error(error);
                        });
                    if (isFunction(getPromise)) {
                        getPromise(fetchApiDelete);
                    }
                };
            }

            /* ======================= End Xử lý ảnh bên phía server ======================= */

            return {
                imgClient,
                imgServer,
            };
        };
        /* ================ End App Function ================ */
        //
        //
        //
        //
        //
        //
        //
        //
        //
        /* ================ Run App ================ */
        const dataInit = [{
                id: "d78we6f87we6f8we5fwe8",
                url: "https://cdn.pixabay.com/photo/2022/01/26/12/01/hut-6968718_960_720.png",
                name: "hut-tree-valley-house-countryside",
            },
            {
                id: "d78we6f87we6f8we5fwec",
                url: "https://cdn.pixabay.com/photo/2022/11/12/16/37/pine-7587392__340.jpg",
                name: "cây thông",
            },
        ];
        const {
            imgServer
        } = uploadImagesControl({
            dataInit,
            mainSelector: ".fui-upload-img-list",
            apiUpload: {
                api: "https://www.filestackapi.com/api/file/store/S3?key=AUXfX4gYFQZOTUEgjqKXLz",
                getPromise(promise) {
                    promise?.then(() => {
                        imgServer.updateData([{
                                id: "d78we6ff8we5fwe8",
                                url: "https://cdn.pixabay.com/photo/2022/01/26/12/01/hut-6968718_960_720.png",
                                name: "hut-tree-valley-house-countryside",
                            },
                            {
                                id: "d78we6f87wefwec",
                                url: "https://cdn.pixabay.com/photo/2022/11/12/16/37/pine-7587392__340.jpg",
                                name: "cây thông",
                            },
                        ]);
                    });
                },
            },
            apiRemove: {
                api: "https://638c3910d2fc4a058a53b237.mockapi.io/api/v1/deleteImg",
            },
        });
        /* ================ End Run App ================ */
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

    @stack('scripts')
</body>

</html>
