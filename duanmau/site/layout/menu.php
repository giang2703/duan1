<style>
    

    .custom-search:focus {
    border-color: #C19FD6 ;        
    }

    .cart-icon {
        position: relative;
    }

    



    
</style>


<nav class="navbar navbar-expand-lg navbar-light  bg-light ">
    <div class="container">
        <a class="navbar-brand" href="<?= $SITE_URL ?>/trang-chinh/index.php">
            <img src="<?= $CONTENT_URL ?>/images/logo.jpg" alt="logo" width="120">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= $name_page == 'trang_chu' ? 'active' : '' ?>" href="<?= $SITE_URL ?>/trang-chinh/index.php">TRANG CHỦ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $name_page == 'san_pham' ? 'active' : '' ?>" href="<?= $SITE_URL ?>/trang-chinh/index.php?san-pham">ORDER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $name_page == 'bai_viet' ? 'active' : '' ?>" href="<?= $SITE_URL ?>/trang-chinh/index.php?bai-viet">THỜI TRANG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $name_page == 'bai_viet' ? 'active' : '' ?>" href="<?= $SITE_URL ?>/trang-chinh/index.php?bai-viet">LÀM ĐẸP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $name_page == 'bai_viet' ? 'active' : '' ?>" href="<?= $SITE_URL ?>/trang-chinh/index.php?bai-viet">LIFESTYLES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $name_page == 'gioi_thieu' ? 'active' : '' ?>" href="<?= $SITE_URL ?>/trang-chinh/index.php?gioi-thieu">ABOUT US</a>
                </li>
            </ul>

            <form class="d-flex mx-auto my-2 my-lg-0" action="<?= $SITE_URL ?>/hang-hoa/liet-ke.php" method="POST">
                <input class="form-control me-2 custom-search" type="search" placeholder="Tìm kiếm..." aria-label="Search">
            </form>

            <div class="ms-lg-4 d-flex align-items-center">
                <a href="<?= $SITE_URL . "/cart/list-cart.php" ?>" class="text-black me-3 cart-icon" style="font-size: 18px;">
                    <i class="fa fa-shopping-cart fs-4"></i>
                    <sup class="badge" style="margin-right: 15px;color: #CA0E00; border: 1px solid #CA0E00;">
                        <?= isset($_SESSION['total_cart']) ? $_SESSION['total_cart'] : 0 ?>
                    </sup>
                </a>
                <div class="dropdown user-dropdown" >
                    <a class="dropdown-toggle text-black" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 18px;">
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']['hinh'] != "") { ?>
                            <img src="<?= $UPLOAD_URL . "/users/" . $_SESSION['user']['hinh'] ?>" width="40" height="40" class="rounded-circle me-2" alt="">
                        <?php } else { ?>
                            <i class="fa fa-user fs-4"></i>
                        <?php } ?>
                        Xin chào!
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                        <?php if (isset($_SESSION['user'])) { ?>
                            <?php if ($_SESSION['user']['vai_tro'] == 1) { ?>
                                <li><a class="dropdown-item" href="<?= $ADMIN_URL . "/trang-chinh/" ?>">Quản trị admin</a></li>
                            <?php } ?>
                            <li><a class="dropdown-item" href="<?= $SITE_URL . '/tai-khoan/cap-nhat-tk.php' ?>">Cập nhật tài khoản</a></li>
                            <li><a class="dropdown-item" href="<?= $SITE_URL . '/tai-khoan/doi-mk.php' ?>">Đổi mật khẩu</a></li>
                            <li><a class="dropdown-item" href="<?= $SITE_URL . '/tai-khoan/dang-nhap.php?btn_logout' ?>">Đăng xuất</a></li>
                        <?php } else { ?>
                            <li><a class="dropdown-item" href="<?= $SITE_URL . '/tai-khoan/dang-nhap.php' ?>">Đăng nhập</a></li>
                            <li><a class="dropdown-item" href="<?= $SITE_URL . '/tai-khoan/dang-ky.php' ?>">Đăng ký</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
