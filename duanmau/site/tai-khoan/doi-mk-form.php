<!-- ============================ COMPONENT LOGIN   ================================= -->
<div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
    <div class="card-body">
        <h4 class="card-title mb-4">Đổi mật khẩu</h4>
        <form action="<?= $SITE_URL ?>/tai-khoan/doi-mk.php" method="POST" id="form_doi_mk">

            <div class="form-group">
                <label for="email" class="form-label">Tài khoản(tên đăng nhập)</label>
                <input name="ma_kh" class="form-control" placeholder="Username" readonly type="text"
                    value="<?= $_SESSION['user']['ma_kh'] ?>">
            </div> <!-- form-group// -->

            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu cũ</label>
                <input name="mat_khau" class="form-control" placeholder="Username" type="password">
            </div> <!-- form-group// -->

            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu mới</label>
                <input name="mat_khau2" class="form-control" placeholder="Username" type="password" id="mat_khau2">
            </div> <!-- form-group// -->

            <div class="form-group">
                <label for="password" class="form-label">Xác nhân mật khẩu mới</label>
                <input name="mat_khau3" class="form-control" placeholder="Username" type="password">
            </div> <!-- form-group// -->

            <i class=" text-danger"><?= (isset($MESSAGE) && (strlen($MESSAGE) > 0)) ? $MESSAGE : "" ?></i>

            <div class="form-group">
                <button type="submit" name="btn_change" class="btn btn-primary btn-block"> Đổi mật khẩu </button>
            </div> <!-- form-group// -->
        </form>

    </div> <!-- card-body.// -->
</div> <!-- card .// -->

<p class="text-center mt-4">Bạn chưa có tài khoản? <a href="<?= $SITE_URL ?>/tai-khoan/dang-ky.php">Đăng ký</a></p>
<br><br>
<!-- ============================ COMPONENT LOGIN  END.// ================================= -->