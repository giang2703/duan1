<!-- ============================ COMPONENT LOGIN   ================================= -->
<style>
    .reset{
        background-color: #c097c6;
        color: #fff;
    }

    .reset:hover{
        background-color: #b686bd;
    }

    .btn-facebook{
        background-color: #4c8fca;
    }

    .btn-facebook:hover{
        background-color: #3d85c6;
    }

    .btn-google{
        background-color: #d43e32;
    }

    .btn-google:hover{
        background-color: #CA0E00;
    }
</style>
<div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
    <div class="card-body">
        <h4 class="card-title mb-4">Đăng nhập</h4>

        <form action="<?= $SITE_URL ?>/tai-khoan/dang-nhap.php" method="POST" id="form_login">
            <a href="#" class="btn btn-facebook btn-block mb-2"> <i class="fab fa-facebook-f"></i> &nbsp Đăng
                nhập bằng facebook</a>
            <a href="#" class="btn btn-google btn-block mb-4"> <i class="fab fa-google"></i> &nbsp Đăng nhập
                bằng google</a>

            <div class="form-group">
                <label for="email" class="form-label">Tài khoản</label>
                <input name="ma_kh" class="form-control" placeholder="Username" type="text" value="<?= $ma_kh ?>">
            </div> <!-- form-group// -->
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input name="mat_khau" class="form-control" placeholder="Password" type="password"
                    value="<?= $mat_khau ?>">
                <i class="text-danger text-center"><?= $MESSAGE ?></i>
            </div> <!-- form-group// -->

            <div class="form-group">
                <a href="<?= $SITE_URL ?>/tai-khoan/quen-mk.php" class="float-right">Quên mật khẩu?</a>

                <label class="float-left custom-control custom-checkbox"> <input type="checkbox"
                        class="custom-control-input" name="ghi_nho" checked>
                    <div class="custom-control-label"> Ghi nhớ tài khoản </div>
                </label>
            </div> <!-- form-group form-check .// -->

            <div class="form-group">
                <button type="submit" name="btn_login" class="btn reset btn-block"> Đăng nhập </button>
            </div> <!-- form-group// -->
        </form>

    </div> <!-- card-body.// -->
</div> <!-- card .// -->

<p class="text-center mt-4">Bạn chưa có tài khoản? <a href="<?= $SITE_URL ?>/tai-khoan/dang-ky.php">Đăng ký</a></p>
<br><br>
<!-- ============================ COMPONENT LOGIN  END.// ================================= -->