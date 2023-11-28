<!-- ============================ COMPONENT LOGIN   ================================= -->
<div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
    <div class="card-body">
        <h4 class="card-title mb-4">Đăng nhập</h4>

        <form action="<?= $SITE_URL ?>/tai-khoan/quen-mk.php" method="POST" id="form_quen_mk">

            <div class="form-group">
                <label for="username" class="form-label">Tài khoản(tên đăng nhập)</label>
                <input name="ma_kh" class="form-control" id="username" placeholder="Username" type="text">
            </div> <!-- form-group// -->

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input name="email" class="form-control" id="email" placeholder="Username" type="text">
            </div> <!-- form-group// -->

            <i class=" text-danger"><?= (isset($MESSAGE) && (strlen($MESSAGE) > 0)) ? $MESSAGE : "" ?></i>


            <div class="form-group">
                <button type="submit" name="btn_forgot_pass" class="btn btn-primary btn-block"> Lấy mật khẩu </button>
            </div> <!-- form-group// -->
        </form>

    </div> <!-- card-body.// -->
</div> <!-- card .// -->

<p class="text-center mt-4">Bạn chưa có tài khoản? <a href="<?= $SITE_URL ?>/tai-khoan/dang-ky.php">Đăng ký</a></p>
<br><br>
<!-- ============================ COMPONENT LOGIN  END.// ================================= -->