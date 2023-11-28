<div class="container">
    <h5 class="alert-dark my-3 py-3 shadow-sm text-center">Cập nhật tài khoản</h5>
    <div class="row m-1 pb-5">
        <div class="col-lg-6 col-md p-6">
            <img src="<?= $UPLOAD_URL . '/users/' . $hinh ?>" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 col-md">
            <form action="<?= $SITE_URL . '/tai-khoan/cap-nhat-tk.php' ?>" method="POST" enctype="multipart/form-data"
                id="update_tk">

                <div class="form-group ">
                    <label for="">Tên đăng nhập</label>
                    <input type="text" name="ma_kh" id="" class="form-control" value="<?= $ma_kh ?>" readonly
                        aria-describedby="helpId">
                </div>
                <div class="form-group form">
                    <label for="">Họ và tên</label>
                    <input type="text" name="ho_ten" id="" class="form-control" value="<?= $ho_ten ?>"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ email</label>
                    <input type="text" name="email" id="" class="form-control" value="<?= $email ?>"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Ảnh đại diện</label>
                    <input type="file" name="up_hinh" id="" class="form-control" aria-describedby="helpId">
                </div>
                <div class="form-group pl-2">

                    <i class=" text-danger"><?= (isset($MESSAGE) && (strlen($MESSAGE) > 0)) ? $MESSAGE : "" ?></i>

                </div>

                <input name="vai_tro" value="<?= $vai_tro ?>" type="hidden">
                <input name="kich_hoat" value="<?= $kich_hoat ?>" type="hidden">
                <input name="mat_khau" value="<?= $mat_khau ?>" type="hidden">
                <input name="hinh" value="<?= $hinh ?>" type="hidden">
                <div class="form-group">
                    <button type="submit" name="btn_update" class="btn btn-info btn-block pt-2 pb-2">Cập
                        nhật</button>
                </div>
            </form>
        </div>


    </div>
</div>