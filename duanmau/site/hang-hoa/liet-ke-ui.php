 <!-- Body -->
 <style>
    /* CSS để tạo hiệu ứng mờ dần cho phần dưới của hình ảnh */
    .half-opacity {
        position: relative;
        width: 100%;
        height: auto;
        overflow: hidden;
        margin-bottom: 1200px;
    }

    .half-opacity::after {
        content: '';
        position: absolute;
        top: 50%; /* Hiển thị gradient từ 50% trên cùng của hình ảnh */
        left: 0;
        width: 100%;
        height: 50%; /* Chiều cao của gradient */
        background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 1)); /* Gradient mờ dần */
        pointer-events: none; /* Đảm bảo sự kiện chuột không bị chặn */
    }

    /* CSS cho container chứa sản phẩm */
    .containers {
        position: absolute;
        top: 160%; /* Hiển thị container ở 1/3 phía trên của hình ảnh */
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90%; /* Điều chỉnh chiều rộng của container */
        max-width: 1200px; /* Giới hạn chiều rộng tối đa nếu cần */
    }
    .ten{
        color: #333;
        text-transform: capitalize;
    }
    .ten:hover{
        color: #B495C9;
        text-transform: capitalize;
    }

    .btn-outline {
        border-radius: 8px;
        border: 1px solid #333;
        color: #333;
        transition: all 0.2s ease-in-out;

    }

    .btn-outline:hover {
        border-radius: 8px;
        border: 1px solid #B495C9;
        color: #fff;
        background-color: #B495C9;
        transform: scale(1.1);
    }

    .product-thumb img {
        transition: transform 0.3s ease-in-out;
        border-radius: 5px;
        max-width: 250px; /* Chiều rộng tối đa */
        max-height: 300px; /* Chiều cao tối đa */
        width: auto; /* Cho phép hình ảnh tự điều chỉnh chiều rộng tối đa */
        height: auto; /* Cho phép hình ảnh tự điều chỉnh chiều cao tối đa */
    }

    .product-thumb img:hover {
        transform: scale(1.08);
        border-radius: 5px;

    }

    
    </style>

<div class="half-opacity">
    <img src="../../content/images/banners/banner23.jpg" alt="">
</div>


<div class="containers">

    <div class="bg-light mb-3">
            <!-- Danh mục -->
            <div >
                <?php require "../layout/danh-muc.php"; ?>

            </div>

    </div>
    
    <div class="row">
        <div class="card-body">
        <!-- Sản phẩm -->
            <div class="col-sm">
                <h5><?= $title_site ?></h5>

                <div class="row">
                    <?php foreach ($items as $item) :
                            extract($item);
                            if ($don_gia > 0) {
                                $percent_discount = number_format($giam_gia / $don_gia * 100);
                            } else {
                                $percent_discount = 0;
                            }

                        ?>
                        
                    <div class="col-12 col-md-6 col-lg-3 mt-3">
                        <div class="card text-center product-card pb-2">
                            
                            <a class="product-thumb" href="<?= $SITE_URL . '/hang-hoa/chi-tiet.php?ma_hh=' . $ma_hh ?>"
                                data-abc="true">
                                <a class="product-thumb" href="<?= $SITE_URL . '/hang-hoa/chi-tiet.php?ma_hh=' . $ma_hh ?>" data-abc="true">
                                    <img class="card-img-top product-img object-fit-contain" src="<?= $UPLOAD_URL . '/products/' . $hinh ?>" alt="Ảnh sản phẩm">
                                </a>

                            </a>
                            <div class="card-body p-0 pt-2 px-2">
                                <h3 class="product-title mh-60">
                                    <a href="<?= $SITE_URL . '/hang-hoa/chi-tiet.php?ma_hh=' . $ma_hh ?>" class="ten">
                                        <?= $ten_hh ?>
                                    </a>
                                </h3>
                                <div class="product-price">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <del class="d-block text-muted fz-14"><?= number_format($don_gia, 0, ',') ?><sup>đ</sup></del>
                                        <p class="font-weight-bold fz-20 d-block ml-3 mb-0" style="color: #333;">
                                            <?= number_format($don_gia - $giam_gia, 0, ',') ?><sup>đ</sup></p>
                                    </div>
                                </div>
                                <div class="col m-2">
                                    <a href="<?= $SITE_URL . "/cart/add-cart.php?id=" . $item['ma_hh'] ?>"
                                        class=" btn btn-outline btn-sm"><i class="fa-solid fa-cart-plus"></i></a>
                                    <a href="<?= $SITE_URL . '/hang-hoa/chi-tiet.php?ma_hh=' . $ma_hh ?>"
                                        class="btn btn-outline btn-sm"><i class="fa-solid fa-circle-info"></i> </a>
                                </div>
                            </div>
                            <div style="background-color: #CA0E00;" class="product-badge text-white bg">
                                <?= $giam_gia == 0 ? '' : '-' . $percent_discount . '%' ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
                <div class="row mt-5 justify-content-center">
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $_SESSION['total_page']; $i++) { ?>

                        <li class="page-item <?= $_SESSION['page'] == $i ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>

                        <?php } ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>