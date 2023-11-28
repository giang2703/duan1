<?php

require '../../global.php';
require '../../dao/khach-hang.php';

extract($_REQUEST);
$VIEW_NAME = 'tai-khoan/quen-mk-form.php';
if (exist_param('btn_forgot_pass')) {
    # code...
    $user = khach_hang_select_by_id($ma_kh);
    if ($user) {
        if ($user['email'] != $email) {
            $MESSAGE = 'Sai email đăng nhập';
        } else {
            $MESSAGE = "Mật khẩu của bạn là :" . $user['mat_khau'];
            global $ma_kh, $mat_khau;
            $VIEW_NAME = 'tai-khoan/dang-nhap-form.php';
        }
    } else {
        $MESSAGE = 'Sai tên đăng nhập';
    }
}

require '../layout.php';