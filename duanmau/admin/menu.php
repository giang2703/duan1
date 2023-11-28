<nav id="sidebar">
    <div class="sidebar-header">
        <a href="<?= $SITE_URL ?>/trang-chinh/">
            <img src="<?= $CONTENT_URL ?>/images/logo.png" alt="logo" class="img-fluid logo">
        </a>
    </div>
    <ul class="list-unstyled components text-secondary">
        <li>
            <a href="<?= $SITE_URL ?>/trang-chinh/"><i class="fas fa-store"></i>Xem trang web</a>
        </li>
        <li>
            <a href="<?= $ADMIN_URL ?>/trang-chinh/"><i class="fas fa-home"></i>Trang chủ</a>
        </li>
        <!-- Danh mục -->
        <li>
            <a href="#categories" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-list-alt"></i>Danh mục
                <i class="fas fa-angle-right float-xl-right"></i>
            </a>
            <ul class="collapse list-unstyled" id="categories">
                <li>
                    <a href="<?= $ADMIN_URL ?>/loai-hang/">
                        <i class="fas fa-plus"></i>Thêm Danh Mục</a>
                </li>
                <li>
                    <a href="<?= $ADMIN_URL ?>/loai-hang/index.php?btn_list">
                        <i class="fas fa-list-ul"></i>Danh sách danh mục</a>
                </li>
            </ul>
        </li>
        <!-- Sản phẩm -->
        <li>
            <a href="#products" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-table"></i>Sản phẩm
                <i class="fas fa-angle-right float-xl-right"></i>
            </a>
            <ul class="collapse list-unstyled" id="products">
                <li>
                    <a href="<?= $ADMIN_URL ?>/hang-hoa/"><i class="fas fa-plus"></i>Thêm sản phẩm</a>
                </li>
                <li>
                    <a href="<?= $ADMIN_URL ?>/hang-hoa/index.php?btn_list">
                        <i class="fas fa-list-ul"></i>Danh sách sản phẩm</a>
                </li>
            </ul>
        </li>

        <!-- tin tức -->
        <li>
            <a href="#produ" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-table"></i>Tin tức 
                <i class="fas fa-angle-right float-xl-right"></i>
            </a>
            <ul class="collapse list-unstyled" id="produ">
                <li>
                    <a href="<?= $ADMIN_URL ?>/tin-tuc/"><i class="fas fa-plus"></i>Thêm tin tức</a>
                </li>
                <li>
                    <a href="<?= $ADMIN_URL ?>/tin-tuc/index.php?btn_list">
                        <i class="fas fa-list-ul"></i>Danh sách tin tức</a>
                </li>
            </ul>
        </li>

        <!-- Khách hàng -->
        <li>
            <a href="#accounts" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down">
                <i class="fas fa-user-friends"></i>Khách hàng
                <i class="fas fa-angle-right float-xl-right"></i>
            </a>
            <ul class="collapse list-unstyled" id="accounts">
                <li>
                    <a href="<?= $ADMIN_URL ?>/khach-hang/"><i class="fas fa-plus"></i>Thêm khách hàng</a>
                </li>
                <li>
                    <a href="<?= $ADMIN_URL ?>/khach-hang/index.php?btn_list">
                        <i class="fas fa-list-ul"></i>Danh sách khách hàng</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?= $ADMIN_URL ?>/binh-luan/"> <i class="fas fa-comments"></i>Bình luận</a>
        </li>
        <li>
            <a href="<?= $ADMIN_URL ?>/thong-ke/"><i class="fas fa-chart-line"></i></i>Thống kê</a>
        </li>
        <li>
            <a href="#"><i class="fas fa-shipping-fast"></i></i>Đơn hàng</a>
        </li>

        <li>
            <a href="#"><i class="fas fa-cog"></i>Cài đặt</a>
        </li>
    </ul>
</nav>