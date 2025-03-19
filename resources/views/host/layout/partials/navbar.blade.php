<header class="navbar navbar-expand-md d-none d-lg-flex d-print-none">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex gap-2">

                <div class="nav-item dropdown d-none d-md-flex me-3">
                    <a href="#" class="nav-link px-0 position-relative" data-bs-toggle="dropdown" tabindex="-1"
                        aria-label="Show notifications">
                        <i class="ti ti-bell fs-1"></i>
                        <span class="badge bg-pink text-pink-fg badge-notification badge-pill mt-2 me-2"
                            id="notify-count">0</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                        <div class="card">
                            <div class="card-header">
                                <i class="ti ti-bell fs-1 me-2"></i>
                                <h3 class="card-title">Thông báo</h3>
                            </div>
                            <div class="list-group list-group-flush list-group-hoverable" id="notification-list">

                            </div>

                            <div class="card-footer text-center border-top">
                                <a href="" class="text-secondary">Xem tất cả</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm"
                        style="background-image: url({{ auth()->guard('web')->user()->image }})"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>
                            {{ auth()->guard('web')->user()->name }}
                        </div>
                        <div class="mt-1 small text-secondary">
                            @if (auth()->guard('web')->user()->role->value == \App\Enums\User\UserRole::Guest->value)
                                Khách hàng
                            @elseif(auth()->guard('web')->user()->role->value == \App\Enums\User\UserRole::Host->value)
                                Chủ nhà
                            @endif
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Đăng xuất</button>
                    </form>
                </div>
            </div>
        </div>

        <div></div>
    </div>
</header>
