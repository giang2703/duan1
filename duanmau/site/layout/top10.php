<div class="card mt-3">
    <div class="card-header bg-primary text-white text-uppercase" role="tab" id="headingTwo">
        <h6 class="mb-0">
            <a class="text-white d-block collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false"
                aria-controls="collapseTwo">
                <i class="fas fa-heart text-danger"></i> Top 10 yêu thích
            </a>
        </h6>
    </div>
    <div id="collapseTwo" class="collapse show" role="tabpanel" aria-labelledby="headingTwo">
        <ul class="list-group category_block">
            <?php foreach ($hh_top10 as $hh) : ?>
            <li class="list-group-item px-2 py-3">
                <a class="d-flex align-items-center"
                    href="<?= $SITE_URL . '/hang-hoa/chi-tiet.php?ma_hh=' . $hh['ma_hh'] ?>">
                    <div class="">
                        <img class="img-fluid img-list" src="<?= $UPLOAD_URL . '/products/' . $hh['hinh'] ?>" alt="">
                    </div>
                    <span class="ml-2 d-blocke"><?= $hh['ten_hh'] ?></span>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>