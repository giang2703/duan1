<br>
<hr>
<div class="d-flex justify-content-center align-items-center" >
    <h3 class="text-center" style="font-family: 'Kaushan Script';color:black;">ORDER</h3>
</div>
<hr>
<div class="container mt-5">
    <div class="row">

    <div class="col-md-3">
    <div class="card product-card">
        <a href="#" class="products-card">
            <img src="../content/images/c.jpg" alt="Product Image" style="height: 300px;object-fit: cover;" class="card-img-top" id="product-image">
            <img src="../content/images/c2.jpg" height="300px" alt="Another Image" class="card-img-top second-image" style="display: none;height: 300px;object-fit: cover;">
        </a>
        <div style="background-color: #CA0E00;color: white;padding: 3px 8px;border-radius: 5px;" class="hot-badge position-absolute top-0 start-0 translate-middle">
        Hot
        </div>
        <div class="card-body">
            <a href="#" class="text-decoration-none text-dark"><h5 class="card-title text-center">Sexi Girl</h5></a>
            <div class="text-center">
                <p class="card-text discounted-price"><del>100.000đ</del></p>
                <p class="card-text">80.000đ</p>
            </div>
        </div>
    </div>
    </div>

    <div class="col-md-3">
    <div class="card product-card">
        <a href="#" class="products-card">
            <img src="../content/images/d.jpg" alt="Product Image" style="height: 300px;object-fit: cover;" class="card-img-top" id="product-image">
            <img src="../content/images/d2.jpg" height="300px" alt="Another Image" class="card-img-top second-image" style="display: none;height: 300px;object-fit: cover;">
        </a>
        <div style="background-color: #CA0E00;color: white;padding: 3px 8px;border-radius: 5px;" class="hot-badge position-absolute top-0 start-0 translate-middle">
        Hot
        </div>
        <div class="card-body">
            <a href="#" class="text-decoration-none text-dark"><h5 class="card-title text-center">Sexi Girl</h5></a>
            <div class="text-center">
                <p class="card-text discounted-price"><del>100.000đ</del></p>
                <p class="card-text">80.000đ</p>
            </div>
        </div>
    </div>
    </div>

    <div class="col-md-3">
    <div class="card product-card">
        <a href="#" class="products-card">
            <img src="../content/images/a.jpg" alt="Product Image" style="height: 300px;object-fit: cover;" class="card-img-top" id="product-image">
            <img src="../content/images/a2.jpg" height="300px" alt="Another Image" class="card-img-top second-image" style="display: none;height: 300px;object-fit: cover;">
        </a>
        <div style="background-color: #CA0E00;color: white;padding: 3px 8px;border-radius: 5px;" class="hot-badge position-absolute top-0 start-0 translate-middle">
        Hot
        </div>
        <div class="card-body">
            <a href="#" class="text-decoration-none text-dark"><h5 class="card-title text-center"> Váy  </h5></a>
            <div class="text-center">
                <p class="card-text discounted-price"><del>100.000đ</del></p>
                <p class="card-text">80.000đ</p>
            </div>
        </div>
    </div>
    </div>

    <div class="col-md-3">
    <div class="card product-card">
        <a href="#" class="products-card">
            <img src="../content/images/e.jpg" alt="Product Image" style="height: 300px;object-fit: cover;" class="card-img-top " id="product-image">
            <img src="../content/images/e2.jpg" height="300px" alt="Another Image" class="card-img-top second-image" style="display: none;height: 300px;object-fit: cover;">
        </a>
        <div style="background-color: #CA0E00;color: white;padding: 3px 8px;border-radius: 5px;" class="hot-badge position-absolute top-0 start-0 translate-middle">
        Hot
        </div>
        <div class="card-body">
            <a href="#" class="text-decoration-none text-dark"><h5 class="card-title text-center">Đầm cổ điển</h5></a>
            <div class="text-center">
                <p class="card-text discounted-price"><del>100.000đ</del></p>
                <p class="card-text">80.000đ</p>
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.products-card').hover(
                function() {
                    $(this).find('#product-image').hide();
                    $(this).find('.second-image').show();
                },
                function() {
                    $(this).find('.second-image').hide();
                    $(this).find('#product-image').show();
                }
            );
        });
    </script>


    </div>
</div>


<div class="container mt-3">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header bg-primary text-white text-uppercase text-center">
                    <i class="fas fa-heart"></i> Sản phẩm nỗi bật của shop BH 🤍
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($top10 as $top10) :
                            extract($top10);
                            if ($don_gia > 0) {
                                $percent_discount = number_format($giam_gia / $don_gia * 100);
                            } else {
                                $percent_discount = 0;
                            }

                        ?>
                        <div class="col-12 col-md-6 col-lg-3 mt-3">
                            <div class="card text-center product-card pb-2">
                                <div class="product-badge text-danger bg-warning">
                                    <?= $giam_gia == 0 ? '' : '-' . $percent_discount . '%' ?>
                                </div>
                                <a class="product-thumb"
                                    href="<?= $SITE_URL . '/hang-hoa/chi-tiet.php?ma_hh=' . $ma_hh ?>" data-abc="true">
                                    <img class="card-img-top product-img object-fit-contain"
                                        src="<?= $UPLOAD_URL . '/products/' . $hinh ?>" alt="Ảnh sản phẩm">
                                </a>
                                <div class="card-body p-0 pt-2 px-2">
                                    <h3 class="product-title mh-60">
                                        <a href="<?= $SITE_URL . '/hang-hoa/chi-tiet.php?ma_hh=' . $ma_hh ?>">
                                            <?= $ten_hh ?>
                                        </a>
                                    </h3>
                                    <div class="product-price">
                                        <div class="col d-flex justify-content-center align-items-center">
                                            <del class="d-block fz-14"><?= number_format($don_gia, 0, ',') ?>đ </del>
                                            <p class="text-danger font-weight-bold fz-20 d-block ml-3 mb-0">
                                                <?= number_format($don_gia - $giam_gia, 0, ',') ?>đ</p>
                                        </div>
                                    </div>
                                    <div class="col m-2">
                                        <a href="<?= $SITE_URL . "/cart/add-cart.php?id=" . $item['ma_hh'] ?>"
                                            class="btn btn-outline-primary btn-sm">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>