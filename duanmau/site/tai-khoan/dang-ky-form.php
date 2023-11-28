 <!-- ============================ COMPONENT REGISTER ================================= -->
 <div class="card mb-4 mx-auto mt-3" style="max-width: 500px;">
     <article class="card-body">
         <header class="mb-4">
             <h4 class="card-title">Đăng ký</h4>
         </header>

         <!-- FORM -->
         <form action="<?= $SITE_URL ?>/tai-khoan/dang-ky.php" method="post" enctype="multipart/form-data"
             id="form_dang_ki">
             <div class="form-row">
                 <div class="col form-group">
                     <label>Họ và tên</label>
                     <input type="text" class="form-control" placeholder="Họ tên" name="ho_ten">
                 </div> <!-- form-group end.// -->
             </div> <!-- form-row end.// -->
             <div class="form-row">
                 <div class="col form-group">
                     <label>Tên đăng nhập</label>
                     <input type="text" class="form-control" placeholder="Username" name="ma_kh">
                 </div> <!-- form-group end.// -->
             </div> <!-- form-row end.// -->
             <div class="form-group">
                 <label>Email</label>
                 <input type="email" class="form-control" placeholder="Nhập địa chỉ email..." name="email">
                 <small class="form-text text-muted">Chúng tôi sẽ không bao giờ chia sẻ email của bạn với bất kỳ
                     ai khác.</small>
             </div> <!-- form-group end.// -->
             <div class="form-row">
                 <div class="col form-group">
                     <label>Ảnh đại diện</label>
                     <input type="file" class="form-control" name="up_hinh">
                 </div> <!-- form-group end.// -->
             </div> <!-- form-row end.// -->
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label>Tạo mật khẩu</label>
                     <input class="form-control" type="password" name="mat_khau" id="mat_khau">
                 </div> <!-- form-group end.// -->
                 <div class="form-group col-md-6">
                     <label>Nhập lại mật khẩu</label>
                     <input class="form-control" type="password" name="mat_khau2">
                 </div> <!-- form-group end.// -->
             </div>
             <i class="text-danger"><?= $MESSAGE ?></i>
             <div class="form-group">
                 <button type="submit" name="btn_register" class="btn btn-primary btn-block"> Đăng ký </button>
             </div> <!-- form-group// -->
             <input type="hidden" name="kich_hoat" value="1">
             <input type="hidden" name="vai_tro" value="0">

             <i class=" text-danger"><?= (isset($MESSAGE) && (strlen($MESSAGE) > 0)) ? $MESSAGE : "" ?></i>

         </form>
         <hr>
         <p class="text-center">Đã có tài khoản? <a href="<?= $SITE_URL ?>/tai-khoan/dang-nhap.php">Đăng nhập</a></p>
     </article> <!-- card-body end .// -->
 </div> <!-- card.// -->
 <!-- ============================ COMPONENT REGISTER END .// ================================= -->