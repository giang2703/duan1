<link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/dashboard.css" type="text/css">
<div class="container">
    <div class="cards row mt-5">
        <div class="card-single col d-flex justify-content-around bg-success text-white py-5 ml-3 ">
            <div>
                <h1 class="font-weight-bold\"><?= $loai ?></h1>
                <span>Danh mục</span>
            </div>
            <div>
                <i class="fas fa-th-list" style="font-size: 80px;"></i>
            </div>
        </div>
        <div class="card-single col d-flex justify-content-around bg-warning text-white py-5 ml-3">
            <div>
                <h1 class="font-weight-bold"><?= $hang_hoa ?></h1>
                <span>Sản phẩm</span>
            </div>
            <div>
                <i class="fas fa-sitemap" style="font-size: 80px;"></i>
            </div>
        </div>
        <div class="card-single col d-flex justify-content-around bg-danger text-white py-5 ml-3">
            <div>
                <h1 class="font-weight-bold"><?= $khach_hang ?></h1>
                <span>Khách hàng</span>
            </div>
            <div>
                <i class="fas fa-users" style="font-size: 80px;"></i>
            </div>
        </div>
        <div class="card-single col d-flex justify-content-around bg-primary text-white py-5 ml-3">
            <div>
                <h1 class="font-weight-bold"><?= $binh_luan ?></h1>
                <span>Bình luận</span>
            </div>
            <div>
                <i class="fas fa-comments" style="font-size: 80px;"></i>
            </div>
        </div>
    </div>
</div>