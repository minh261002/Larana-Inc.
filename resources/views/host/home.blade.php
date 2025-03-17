<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="url-home" content="{{ url('/') }}" />
    <title>
        Cho thuê nhà của bạn trên Larana
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
        <header class="navbar navbar-expand-md d-print-none shadow-none">
            <div class="container-xl">
                <div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('admin/images/logo.png') }}" class="img-fluid" width="150" />
                    </a>
                </div>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item">
                        <a href="" class="btn btn-primary">
                            <i class="ti ti-home fs-2 me-2"></i>
                            Larana Setup
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="w-100 mx-auto" style="max-width: 1200px;">
                <div class="row my-100px  w-100 align-items-center justify-between">
                    <div
                        class="col-md-6 text-center text-md-start d-flex align-items-center justify-content-center flex-column">
                        <h1 class="fw-bold text-center" style="font-size: 48px !important;line-height: 1.2 !important;">
                            Nhà của bạn có thể giúp bạn kiếm
                            được <span class="text-primary">₫10.538.064</span> trên Larana</h1>
                        <p><strong>7 đêm</strong> · ₫1.505.438/đêm</p>
                        <p class="text-secondary">Tìm hiểu cách Larana ước tính thu nhập</p>

                        <div class="slider-container my-3">
                            <input type="range" class="form-range" min="1" max="30" value="7">
                        </div>

                        <div class="input-group mt-3">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="ti ti-search"></i>
                            </span>
                            <input type="text" class="form-control border-start-0"
                                placeholder="Thành phố Hồ Chí Minh - Toàn bộ nhà - 2 phòng ngủ">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="map-container bg-light d-flex align-items-center justify-content-center w-100 rounded-3 shadow-lg"
                            style="height: 600px">
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-100px">
                <h1 class="fw-bold text-center mb-5" style="font-size: 36px !important;line-height: 1.2 !important;">
                    Đăng cho thuê nhà trên <br /> Larana thật dễ dàng
                </h1>

                <div class="w-75 mx-auto">
                    <img src="{{ asset('admin/images/mb.avif') }}" class="img-fluid" />
                </div>

                <div class="w-75 mx-auto mt-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div class="btn btn-icon p-2 bg-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                        style="display:block;height:32px;width:32px;fill:currentColor"
                                        aria-hidden="true" role="presentation" focusable="false">
                                        <path
                                            d="m17.98 1.9.14.14 13.25 13.25-1.41 1.42-.96-.96v12.58a2 2 0 0 1-1.85 2H5a2 2 0 0 1-2-1.85V15.75l-.96.96-1.41-1.42L13.88 2.04a3 3 0 0 1 4.1-.13zm-2.6 1.47-.09.08L5 13.75 5 28.33h6v-10a2 2 0 0 1 1.85-2H19a2 2 0 0 1 2 1.85v10.15h6V13.75L16.7 3.45a1 1 0 0 0-1.31-.08zM19 18.33h-6v10h6z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="text-center mt-3 fs-3">
                                    Tạo mục cho thuê cho địa điểm của bạn chỉ trong vài bước
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div class="btn btn-icon p-2 bg-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                        style="display:block;height:32px;width:32px;fill:currentColor"
                                        aria-hidden="true" role="presentation" focusable="false">
                                        <path
                                            d="M19 1v2h-2v2.04a13 13 0 0 1 12 12.65V18a13 13 0 1 1-26 0 12.96 12.96 0 0 1 4.1-9.48L5.3 6.71l1.4-1.42 1.97 1.97A12.93 12.93 0 0 1 15 5.04V3h-2V1h6zm-3 6a11 11 0 1 0 0 22 11 11 0 0 0 0-22zm-4.3 3.3 6 6-1.4 1.4-6-6 1.4-1.4zM16 9a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="text-center mt-3 fs-3">
                                    Tiếp tục với tốc độ riêng của bạn và thực hiện thay đổi bất cứ khi nào
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div class="btn btn-icon p-2 bg-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                        style="display:block;height:32px;width:32px;fill:currentColor"
                                        aria-hidden="true" role="presentation" focusable="false">
                                        <path
                                            d="M26 1a5 5 0 0 1 5 4.78v10.9a5 5 0 0 1-4.78 5H26a5 5 0 0 1-4.78 5h-4l-3.72 4.36-3.72-4.36H6a5 5 0 0 1-4.98-4.56L1 21.9 1 21.68V11a5 5 0 0 1 4.78-5H6a5 5 0 0 1 4.78-5H26zm-5 7H6a3 3 0 0 0-3 2.82v10.86a3 3 0 0 0 2.82 3h4.88l2.8 3.28 2.8-3.28H21a3 3 0 0 0 3-2.82V11a3 3 0 0 0-3-3zm-1 10v2H6v-2h14zm6-15H11a3 3 0 0 0-3 2.82V6h13a5 5 0 0 1 5 4.78v8.9a3 3 0 0 0 3-2.82V6a3 3 0 0 0-2.82-3H26zM15 13v2H6v-2h9z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="text-center mt-3 fs-3">
                                    Nhận hỗ trợ 1:1 từ các chủ nhà giàu kinh nghiệm bất kỳ lúc nào
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-100 mt-5">
                    <img src="{{ asset('admin/images/bg.avif') }}" />
                </div>
                <div class="w-100 mx-auto mt-5">
                    <div class="row">
                        <div class="col-md-4">
                            <h2>Nhận sự hướng dẫn riêng từ một Chủ nhà siêu cấp</h2>
                            Chúng tôi sẽ kết nối bạn với một Chủ nhà siêu cấp trong khu vực của bạn, người sẽ hướng dẫn
                            bạn từ câu hỏi đầu tiên cho đến vị khách đầu tiên – qua điện thoại, cuộc gọi video hoặc tính
                            năng trò chuyện.
                        </div>

                        <div class="col-md-4">
                            <h2>Vị khách có kinh nghiệm cho lượt đặt phòng đầu tiên của bạn</h2>
                            Với lượt đặt phòng đầu tiên, bạn có thể lựa chọn chào đón một khách có kinh nghiệm, đã có ít
                            nhất 3 kỳ ở và lịch sử hoạt động tốt trên Airbnb.
                        </div>

                        <div class="col-md-4">
                            <h2> Hỗ trợ đặc biệt từ Larana </h2>
                            Chỉ cần nhấn nút là Chủ nhà mới có thể liên hệ với nhân viên Hỗ trợ cộng đồng được đào tạo
                            đặc biệt, có thể trợ giúp về mọi vấn đề, từ sự cố tài khoản cho đến hỗ trợ thanh toán.
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-100px">
                <style>
                    .custom-avif {
                        filter: invert(42%) sepia(80%) saturate(500%) hue-rotate(180deg);
                    }
                </style>
                <div class="w-100 text-center mb-2">
                    <img src="{{ asset('admin/images/cover.avif') }}" class="img-fluid custom-avif text-center"
                        width="200" />
                </div>
                <h1 class="fw-bold text-center mb-5" style="font-size: 36px !important;line-height: 1.2 !important;">
                    Cho thuê nhà trên Larana với <br /> chương trình bảo vệ toàn diện
                </h1>

                <style>
                    .feature-title {
                        font-weight: bold;
                        font-size: 1.2rem;
                    }
                </style>
                <table class="table table-borderless" style="max-width: 950px;margin: 0 auto;">
                    <thead>
                        <tr>
                            <th class="text-start"></th>
                            <th class="text-center">Larana</th>
                            <th class="text-center">Đơn vị cạnh tranh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p class="feature-title fs-1">Xác minh danh tính của khách</p>
                                <p class="text-secondary fs-3">
                                    Hệ thống xác minh toàn diện của chúng tôi kiểm tra các thông tin như tên, địa chỉ,
                                    giấy tờ tùy thân do chính phủ cấp và nhiều thông tin khác để xác nhận danh tính của
                                    khách đặt phòng/đặt chỗ trên Larana.
                                </p>
                            </td>
                            <td class="text-center">
                                <i class="ti ti-check fs-1 text-success"></i>
                            </td>
                            <td class="text-center">
                                <i class="ti ti-check fs-1 text-success"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="feature-title fs-1">Sàng lọc yêu cầu đặt phòng</p>
                                <p class="text-secondary fs-3">
                                    Công nghệ độc quyền của chúng tôi phân tích hàng trăm yếu tố trong mỗi yêu cầu đặt
                                    phòng để chặn những lượt đặt cho thấy nguy cơ cao về việc tổ chức tiệc tùng gây
                                    phiền toái và thiệt hại tài sản.
                                </p>
                            </td>
                            <td class="text-center">
                                <i class="ti ti-check fs-1 text-success"></i>
                            </td>
                            <td class="text-center">
                                <i class="ti ti-x fs-1 text-danger"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="feature-title fs-1">Bảo vệ thiệt hại trị giá 3 triệu USD</p>
                                <p class="text-secondary fs-3">Airbnb bồi hoàn thiệt hại do khách gây ra và bảo vệ chủ
                                    nhà
                                    trước các sự cố phát
                                    sinh.</p>
                            </td>
                            <td class="text-center">
                                <i class="ti ti-check fs-1 text-success"></i>
                            </td>
                            <td class="text-center">
                                <i class="ti ti-x fs-1 text-danger"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="feature-title fs-1">Hỗ trợ 24/7</p>
                                <p class="text-secondary fs-3">Chúng tôi luôn sẵn lòng hỗ trợ bạn qua điện thoại, email
                                    và
                                    trò chuyện trực tuyến.
                                </p>
                            </td>
                            <td class="text-center">
                                <i class="ti ti-check fs-1 text-success"></i>
                            </td>
                            <td class="text-center">
                                <i class="ti ti-x fs-1 text-danger"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="feature-title fs-1">Bảo vệ chủ nhà</p>
                                <p class="text-secondary fs-3">Chúng tôi bảo vệ chủ nhà trước các sự cố phát sinh trong
                                    quá
                                    trình cho thuê nhà.</p>
                            </td>
                            <td class="text-center">
                                <i class="ti ti-check fs-1 text-success"></i>
                            </td>
                            <td class="text-center">
                                <i class="ti ti-x fs-1 text-danger"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="my-100px">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <img src="{{ asset('admin/images/bg-2.webp') }}" class="img-fluid "
                            style="border-radius: 20px 0 0 20px;" />
                    </div>
                    <div class="col-md-6">
                        <h1 class="fw-bold text-left" style="font-size: 36px !important;line-height: 1.2 !important;">
                            Bạn vẫn còn câu hỏi ?
                        </h1>
                        <span class="text-secondary fs-3">
                            Hãy tìm câu trả lời từ một Chủ nhà siêu cấp giàu kinh nghiệm ở gần bạn.
                        </span>

                        <Button class="btn btn-outline-primary mt-3 w-50">Tìm hiểu thêm</Button>
                    </div>
                </div>
            </div>
        </div>

        @include('client.layout.partials.footer')
    </div>


    <script src="{{ asset('admin/js/jquery.js') }}"></script>
    <script src="{{ asset('admin/js/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('admin/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('admin/js/demo.min.js?1692870487') }}" defer></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&libraries=places&language=vi&callback=initMaps">
    </script>
    <script>
        function initMaps() {
            const map = new google.maps.Map(document.querySelector('.map-container'), {
                center: {
                    lat: 10.762622,
                    lng: 106.660172
                },
                zoom: 12,
                disableDefaultUI: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                rotateControl: true,
                fullscreenControl: true,
            });

            const input = document.querySelector('.input-group input');
            const searchBox = new google.maps.places.SearchBox(input);

            map.addListener('bounds_changed', () => {
                searchBox.setBounds(map.getBounds());
            });

            let markers = [];

            searchBox.addListener('places_changed', () => {
                const places = searchBox.getPlaces();

                if (places.length === 0) {
                    return;
                }

                markers.forEach((marker) => {
                    marker.setMap(null);
                });

                markers = [];

                const bounds = new google.maps.LatLngBounds();

                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log('Returned place contains no geometry');
                        return;
                    }

                    const marker = new google.maps.Marker({
                        map,
                        title: place.name,
                        position: place.geometry.location,
                    });

                    markers.push(marker);

                    if (place.geometry.viewport) {
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });

                map.fitBounds(bounds);
            });
        }
    </script>
</body>

</html>
