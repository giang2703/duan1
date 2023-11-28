<div class="card">
    <div class="card-header bg-primary text-white text-uppercase" role="tab" id="headingOne">
        <h6 class="mb-0">
            <a class="text-white d-block" data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                aria-controls="collapseOne">
                <i class="fa fa-list"></i> Danh mục
            </a>
        </h6>
    </div>

    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">

        <ul class="list-group category_block">
            <?php foreach ($ds_loai as $loai) : ?>
            <li class="list-group-item">
                <a class="d-block"
                    href="<?= $SITE_URL . "/hang-hoa/liet-ke.php?ma_loai=" . $loai['ma_loai'] ?>"><?= $loai['ten_loai'] ?></a>
            </li>
            <?php endforeach ?>

        </ul>
    </div>
</div>