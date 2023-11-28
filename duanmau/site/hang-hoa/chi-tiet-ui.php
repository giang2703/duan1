<!-- Product-detail -->

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= $ROOT_URL ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?= $SITE_URL . '/hang-hoa/liet-ke.php' ?>">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <!-- Image -->
        <div class="col-12 col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-body text-center">
                    <a href="#" data-toggle="modal" data-target="#productModal">
                        <!-- Ảnh sản phẩm -->
                        <img class="img-fluid" src="<?= $UPLOAD_URL . "/products/" . $hinh ?>" />
                        <p class="text-center">Phóng to ảnh</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- Add to cart -->
        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card bg-light mb-3">
                <div class="card-body text-center">
                    <h4 class="card-title"><?= $ten_hh ?></h4>
                    <!-- Giá sản phẩm -->
                    <?php
                    if ($don_gia > 0) {
                        $percent_discount = number_format($giam_gia / $don_gia * 100);
                    } else {
                        $percent_discount = 0;
                    }
                    ?>
                    <div class="product-price">
                        <div class="col d-flex justify-content-center align-items-center">
                            <del class="d-block"><?= number_format($don_gia, 0, ',') ?>đ</del>
                            <p class="text-danger font-weight-bold d-block ml-3 mb-0">
                                <?= number_format($don_gia - $giam_gia, 0, ',') ?>đ</p>
                        </div>
                    </div>

                    <!-- <p class="price_discounted">149.90 $</p> -->
                    <form method="get" action="cart.html">

                        <div class="form-group">
                            <label>Quantity :</label>
                            <div class="input-group mb-3 justify-content-center">
                                <div class="input-group-prepend">
                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                        data-type="minus" data-field="">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="text-center" id="quantity" name="quantity" min="1" max="100"
                                    value="1">
                                <div class="input-group-append">
                                    <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                        data-type="plus" data-field="">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <a href="cart.html" class="btn btn-danger btn-lg btn-block text-uppercase">
                            <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                        </a>
                    </form>
                    <div class="product_rassurance">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-truck fa-2x"></i><br />Giao hàng nhanh</li>
                            <li class="list-inline-item"><i class="fa fa-credit-card fa-2x"></i><br />Bảo mật
                            </li>
                            <li class="list-inline-item"><i class="fa fa-phone fa-2x"></i><br />09820841
                            </li>
                        </ul>
                    </div>
                    <div class="reviews_product p-3 mb-2 ">
                        3 reviews
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        (4/5)
                        <a class="pull-right" href="#reviews">Xem tất cả đánh giá</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Description -->
        <div class="col-12">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i>
                    Mô tả sản phẩm
                </div>
                <div class="card-body">
                    <p class="card-text"><?= $mo_ta ?></p>
                </div>
            </div>
        </div>

        <!-- Reviews -->
        <?php require "./binh-luan.php"; ?>
    </div>
</div>
<!-- Same product -->
<section class="same-product mt-5">
    <h3 class="same-product-title text-center">Sản phẩm cùng loại</h3>
    <?php require "./hang-cung-loai.php"; ?>
</section>

<!-- Modal image -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="productModalLabel"><?= $ten_hh ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img class="img-fluid" src="<?= $UPLOAD_URL . "/products/" . $hinh ?>" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>