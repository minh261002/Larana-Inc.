@php
    $user = Auth::guard('web')->user();
@endphp

<header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
                <img src="{{ asset('admin/images/logo.png') }}" class="img-fluid" width="150" />
            </a>
        </div>
        <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
                <div class="nav-item dropdown d-none d-md-flex me-3">
                    <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                        aria-label="Show notifications">
                        <i class="ti ti-bell fs-1"></i>
                        <span class="badge bg-red"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Thông báo</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nav-item me-3">
                    <a href="{{ route('host.dashboard') }}" class="btn btn-outline-primary btn-sm rounded-5 p-1 px-2">
                        <i class="ti ti-home fs-2 me-2"></i>
                        Cho thuê nhà trên Larana
                    </a>
                </div>
            </div>

            @if (Auth::guard('web')->check())
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown"
                        aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url('{{ $user->image }}')"></span>
                        <div class="d-none d-xl-block ps-2">
                            <div>
                                {{ $user->name }}
                            </div>
                            <div class="mt-1 small text-secondary">
                                @if ($user->role->value == \App\Enums\User\UserRole::Guest->value)
                                    Khách hàng
                                @elseif($user->role->value == \App\Enums\User\UserRole::Host->value)
                                    Chủ nhà
                                @endif
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Đăng xuất</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown"
                        aria-label="Open user menu">
                        <span class="avatar avatar-sm"
                            style="background-image: url('{{ asset('admin/images/not-found.jpg') }}')"></span>
                        <div class="d-none d-xl-block ps-2">
                            <div>Tài khoản</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="{{ route('login') }}" class="dropdown-item">Đăng nhập</a>
                        <a href="{{ route('register') }}" class="dropdown-item">Đăng ký</a>
                    </div>
                </div>
            @endif

        </div>
    </div>
</header>
