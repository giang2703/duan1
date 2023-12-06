<!-- Product-detail -->
<style>
    .add_to_cart_block {
    display: flex;
    flex-wrap: wrap;
}

.card {
    flex: 1;
    margin: 10px; /* Để tạo khoảng cách giữa các ô */
}

.reset{
        background-color: #c097c6;
        color: #fff;
    }

    .reset:hover,
    .them:hover{
        background-color: #b686bd;
        color: #fff;

    }

    .them{
        border-color: #b686bd;
        color: #b686bd;        
    }

</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="container">
    <br>
    <div class="row">
        <!-- Image -->
        <div class="col-12 col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-body text-center">
                    <a href="#" data-toggle="modal" data-target="#productModal">
                        <!-- Ảnh sản phẩm -->
                        <img class="img-fluid" src="<?= $UPLOAD_URL . "/products/" . $hinh ?>" />

                    </a>
                </div>
            </div>
        </div>

        <!-- Add to cart -->
        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card bg-light mb-3">
                <div class="card-body text-center">
                    <h4 class="card-title"><?= $ten_hh ?></h4>
                    <div class="reviews_product p-3 mb-2 ">
                        
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        (4.9/5) <br>
                        3 reviews
                        <a class="pull-right" href="#reviews">Xem tất cả đánh giá</a>
                    </div>

                    <div>
                    <p style="color: #46DBB5;"><i class="fa-solid fa-truck"></i> Miễn phí vận chuyển</p>
                    <p ><i class="fa-regular fa-face-grin-stars"></i> Đảm bảo chất lượng</p>
                    </div>



                    <!-- Giá sản phẩm -->
                    <?php
                    if ($don_gia > 0) {
                        $percent_discount = number_format($giam_gia / $don_gia * 100);
                    } else {
                        $percent_discount = 0;
                    }
                    ?>
                    <div class="product-price">
                        <div class="col d-flex justify-content-center " style="font-size: 25px;">
                            <del class="d-block"><?= number_format($don_gia, 0, ',') ?><sup>đ</sup></del>
                            <p class="text-danger font-weight-bold d-block ml-3 mb-0">
                                <?= number_format($don_gia - $giam_gia, 0, ',') ?><sup>đ</sup></p>
                        </div>
                    </div>

                    <form method="get" action="cart.html">

                        <div class="form-group">
                            <label></label>
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
                        
                        <div>
                        <a href="<?= $SITE_URL . "/cart/add-cart.php?id=" . $item['ma_hh'] ?>" class="btn them btn-block">
                            <i class="fa-solid fa-cart-plus"></i> Thêm vào giỏ hàng
                        </a>
                        <a href="cart.html" class="btn reset btn-block"> Mua ngay
                        </a>
                        </div>
                    </form>
                    
                    

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Description -->
        <div class="col-12">
            <div class="card border-light mb-3">
                <div class=" text-uppercase" style="padding: 10px;background-color: #f4edf5;color: #b686bd ;">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>