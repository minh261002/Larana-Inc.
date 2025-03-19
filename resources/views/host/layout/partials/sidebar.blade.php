@php
    $hostSidebar = config('host_sidebar');
@endphp

<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark p-2">
            <a href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('admin/images/logo.png') }}" alt="Logo" class="navbar-brand-image"
                    style="height: 40px">
            </a>
        </h1>

        <div class="navbar-nav flex-row d-lg-none">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm"
                        style="background-image: url(
                    {{ auth()->guard('web')->user()->image }})"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>
                            {{ auth()->guard('web')->user()->name }}
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

        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item {{ setSidebarActive(['admin.dashboard']) }}">
                    <a class="nav-link  {{ setSidebarShow(['admin.dashboard']) }}"
                        href="{{ route('admin.dashboard') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-home-2 fs-2"></i>
                        </span>
                        <span class="nav-link-title">
                            Dashboard
                        </span>
                    </a>
                </li>

                {{-- return [
                 [
                 'active' => ['host.property.*'],
                 'show' => ['host.property.*'],
                 'title' => 'Chỗ ở',
                 'icon' => 'ti ti-home fs-2',
                 'children' => [
                 [
                 'title' => 'Thêm mới',
                 'route' => 'admin.property.create',
                 'icon' => 'ti ti-plus fs-3 me-2',
                 ],
                 [
                 'title' => 'Danh sách',
                 'route' => 'admin.property.index',
                 'icon' => 'ti ti-list fs-3 me-2',
                 ]
                 ]
                 ],
                 [
                 'active' => ['host.property.*'],
                 'show' => ['host.property.*'],
                 'title' => 'Chỗ ở',
                 'icon' => 'ti ti-home fs-2',
                 'children' => [
                 [
                 'title' => 'Thêm mới',
                 'route' => 'admin.property.create',
                 'icon' => 'ti ti-plus fs-3 me-2',
                 ],
                 [
                 'title' => 'Danh sách',
                 'route' => 'admin.property.index',
                 'icon' => 'ti ti-list fs-3 me-2',
                 ]
                 ]
                 ]
                 ]; --}}
                @foreach ($hostSidebar as $menu)
                    <li class="nav-item dropdown {{ setSidebarActive([$menu['active']]) }}">
                        <a class="nav-link dropdown-toggle {{ setSidebarShow($menu['show']) }}" href="#"
                            data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="{{ $menu['icon'] }}"></i>
                            </span>
                            <span class="nav-link-title">{{ $menu['title'] }}</span>
                        </a>

                        @if (!empty($menu['children']))
                            <div class="dropdown-menu {{ setSidebarShow($menu['show']) }}">
                                <div class="dropdown-menu-columns">
                                    @foreach ($menu['children'] as $child)
                                        @if (isset($child['permission']) && !auth()->guard('admin')->user()->can($child['permission']))
                                            @continue
                                        @endif
                                        <a class="dropdown-item" href="{{ route($child['route']) }}">
                                            <i class="{{ $child['icon'] }} me-2"></i>
                                            {{ $child['title'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</aside>
