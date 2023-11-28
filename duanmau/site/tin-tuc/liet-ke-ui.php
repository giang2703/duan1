 <!-- Body -->

 <div class="container">
     <div class="row">
         <div class="col">
             <nav aria-label="breadcrumb">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?= $ROOT_URL ?>">Trang chủ</a></li>
                     <li class="breadcrumb-item"><a href="<?= $SITE_URL . '/hang-hoa/liet-ke.php' ?>">Sản phẩm</a></li>
                 </ol>
             </nav>
         </div>
     </div>
 </div>
 <div class="container">
     <div class="row">
         <div class="col-12 col-sm-3">
             <div class="bg-light mb-3">
                 <?php require "../layout/tim-kiem.php"; ?>
                 <!-- Danh mục -->
                 <div id="accordion" role="tablist">
                     <?php require "../layout/danh-muc.php"; ?>
                     <?php require "../layout/top10.php"; ?>
                     <?php require "../layout/dac-biet.php"; ?>
                 </div>
             </div>

         </div>
         <!-- Sản phẩm -->
         <div class="col">
             <h5 class="alert-secondary pt-3 pb-3 pl-sm-4 shadow-sm text-center ">
                 <?= $title_site ?></h5>

             <div class="row">
                 <?php foreach ($items as $item) :
                        extract($item);
                        if ($don_gia > 0) {
                            $percent_discount = number_format($giam_gia / $don_gia * 100);
                        } else {
                            $percent_discount = 0;
                        }

                    ?>
                 <div class="col-12 col-md-6 col-lg-4 mt-3">
                     <div class="card text-center product-card pb-2">
                         <div class="product-badge text-danger bg-warning">
                             <?= $giam_gia == 0 ? '' : '-' . $percent_discount . '%' ?>
                         </div>
                         <a class="product-thumb" href="<?= $SITE_URL . '/hang-hoa/chi-tiet.php?ma_hh=' . $ma_hh ?>"
                             data-abc="true">
                             <img class="card-img-top product-img object-fit-contain"
                                 src="<?= $UPLOAD_URL . '/products/' . $hinh ?>" alt="Ảnh sản phẩm">
                         </a>
                         <div class="card-body p-0 pt-3 px-2">
                             <h3 class="product-title mh-60">
                                 <a href="<?= $SITE_URL . '/hang-hoa/chi-tiet.php?ma_hh=' . $ma_hh ?>">
                                     <?= $ten_hh ?>
                                 </a>
                             </h3>
                             <div class="product-price">
                                 <div class="col d-flex justify-content-center align-items-center">
                                     <del class="d-block text-muted fz-14"><?= number_format($don_gia, 0, ',') ?>đ</del>
                                     <p class="text-danger font-weight-bold fz-20 d-block ml-3 mb-0">
                                         <?= number_format($don_gia - $giam_gia, 0, ',') ?>đ</p>
                                 </div>
                             </div>
                             <div class="col m-2">
                                 <a href="<?= $SITE_URL . "/cart/add-cart.php?id=" . $item['ma_hh'] ?>"
                                     class=" btn btn-outline-primary btn-sm">Add to cart</a>
                             </div>
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