<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        @if(session('akses') == 'admin')
        <li class="nav-heading">Admin</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="kategori">
                <i class="bx bxs-category-alt"></i>
                <span>Kategori</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="produk">
                <i class="bx bxl-product-hunt"></i>
                <span>Produk</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Inventory</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="barang">
                        <i class="bi bi-circle"></i><span>Barang</span>
                    </a>
                </li>
                <li>
                    <a href="stockin">
                        <i class="bi bi-circle"></i><span>Stock in</span>
                    </a>
                </li>
                <li>
                    <a href="audit">
                        <i class="bi bi-circle"></i><span>Audit</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="distributor">
                <i class="bi bi-truck"></i>
                <span>Distributor</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="/employee">
                <i class="bi bi-person"></i>
                <span>User</span>
            </a>
        </li>
        @else
        <li class="nav-heading">Kasir</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-currency-dollar"></i>
                <span>Transaksi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bx bxs-food-menu"></i>
                <span>Produk</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-clock-history"></i>
                <span>Riwayat</span>
            </a>
        </li>
        @endif
    </ul>

</aside>