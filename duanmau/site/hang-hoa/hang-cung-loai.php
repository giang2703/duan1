 <!-- ============== COMPONENT SLIDER ITEMS SLICK  ============= -->
 <div class="container-fluid p-5">
     <div class="row">
         <div class="col-md-12">
             <div class="owl-carousel">


                 <?php foreach ($hh_cung_loai as $hh_cl) :

                        if ($don_gia > 0) {
                            $p_d_hh_cl = number_format($hh_cl['giam_gia'] / $hh_cl['don_gia'] * 100);
                        } else {
                            $p_d_hh_cl = 0;
                        }

                    ?>
                 <div class="product-card">
                     <div class="product-badge text-danger bg-warning">
                         <?= $hh_cl['giam_gia'] == 0 ? '' : '-' . $p_d_hh_cl . '%' ?>
                     </div>
                     <a class="product-thumb"
                         href="<?= $SITE_URL . '/hang-hoa/chi-tiet.php?ma_hh=' . $hh_cl['ma_hh'] ?>"
                         data-abc="true"><img class="product-img"
                             src="<?= $UPLOAD_URL . "/products/" . $hh_cl['hinh'] ?>">
                     </a>
                     <div class="card-body p-0 pt-3">
                         <h3 class="product-title mh-60">
                             <a href="<?= $SITE_URL . '/hang-hoa/chi-tiet.php?ma_hh=' . $hh_cl['ma_hh'] ?>"
                                 data-abc="true"><?= $hh_cl['ten_hh'] ?></a>
                         </h3>
                         <div class="product-price">
                             <div class="col d-flex justify-content-center align-items-center">
                                 <del class="d-block fz-14"><?= number_format($hh_cl['don_gia'], 0, ',') ?>đ</del>
                                 <p class="text-danger font-weight-bold fz-20 d-block ml-3 mb-0">
                                     <?= number_format($hh_cl['don_gia'] - $hh_cl['giam_gia'], 0, ',') ?>đ</p>
                             </div>
                         </div>
                         <div class="product-buttons">
                             <a href="<?= $SITE_URL . "/cart/add-cart.php?id=" . $hh_cl['ma_hh'] ?>"
                                 class="btn btn-outline-primary btn-sm">Add to cart</a>
                         </div>
                     </div>
                 </div>
                 <?php endforeach; ?>
             </div>
         </div>
     </div>
 </div>
 </div>
 <!-- ============== COMPONENT SLIDER ITEMS SLICK .end // ============= -->