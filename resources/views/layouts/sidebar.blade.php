<aside id="layout-menu" class="layout-menu menu-vertical menu  bg-primary">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">

            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">BankSampah</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">


        @role(['super-admin'])
            <li class="menu-item {{ Request::is('admin/dashboard') ? 'active open' : '' }}">
                <a href="/admin/dashboard" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Admin Menu</span></li>
            <li class="menu-item {{ Request::is('admin/master-data*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Master Data</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ Request::is('admin/master-data/users*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}" class="menu-link">
                            <div data-i18n="Without menu">Admin</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Request::is('admin/master-data/nasabah*') ? 'active' : '' }}">
                        <a href="/admin/master-data/nasabah" class="menu-link">
                            <div data-i18n="Without menu">Nasabah</div>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-item {{ Request::is('admin/sampah-masuk*') ? 'active' : '' }}">
                <a href="/admin/sampah-masuk" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-box"></i>
                    <div data-i18n="Without menu">Melihat Sampah Yang Masuk</div>
                </a>
            </li>

            <li class="menu-item {{ Request::is('admin/sampah') ? 'active' : '' }}">
                <a href="/admin/sampah" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-box"></i>
                    <div data-i18n="Without menu">Input Data Penjualan Sampah Masuk</div>
                </a>
            </li>
        @endrole

        <!-- Misc -->
        @role(['kabag'])
            <li class="menu-item {{ Request::is('admin/dashboard') ? 'active open' : '' }}">
                <a href="/admin/dashboard" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>
            <li class="menu-header small text-uppercase "><span class="menu-header-text">Laporan</span></li>
            <li class="menu-item {{ Request::is('laporan/sampah') ? 'active' : '' }}">
                <a href="/laporan/sampah" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-report"></i>
                    <div data-i18n="Without menu">Laporan</div>
                </a>
            </li>
        @endrole
        @role(['super-admin'])
            <li class="menu-header small text-uppercase "><span class="menu-header-text">Laporan</span></li>
            <li class="menu-item {{ Request::is('laporan/sampah') ? 'active' : '' }}">
                <a href="/laporan/sampah" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-report"></i>
                    <div data-i18n="Without menu">Laporan</div>
                </a>
            </li>
            <li class="menu-header small text-uppercase "><span class="menu-header-text">Misc</span></li>
            <li class="menu-item {{ Request::is('admin/tabungan-sampah') ? 'active' : '' }}">
                <a href="/admin/tabungan-sampah" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-box"></i>
                    <div data-i18n="tabungan-sampah">Tabungan Sampah</div>
                </a>
            </li>
        @endrole

        @role(['nasabah'])
            <li class="menu-item {{ Request::is('nasabah/dashboard') ? 'active open' : '' }}">
                <a href="/nasabah/dashboard" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Nasabah Menu</span></li>
            <li class="menu-item {{ Request::is('nasabah/sampah*') ? 'active' : '' }}">
                <a href="/nasabah/sampah" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-box"></i>
                    <div data-i18n="sampah"> Input Sampah</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('nasabah/saldo*') ? 'active' : '' }}">
                <a href="/nasabah/saldo" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-money"></i>
                    <div data-i18n="saldo">Tabungan Sampah</div>
                </a>
            </li>
        @endrole
    </ul>
</aside>
