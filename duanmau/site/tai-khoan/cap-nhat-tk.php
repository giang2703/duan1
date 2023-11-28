<?php
require '../../global.php';
require '../../dao/khach-hang.php';


check_login();

extract($_REQUEST);

if (exist_param("btn_update")) {
    $file_name = save_file("up_hinh", "$UPLOAD_URL/users/");
    $hinh = $file_name ? $file_name : $hinh;
    try {
        khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);
        $MESSAGE = "Cập nhật thành công!";
        $_SESSION['user'] = khach_hang_select_by_id($ma_kh);
    } catch (Exception $exc) {
        $MESSAGE = "Cập nhật thất bại!";
    }
} else {
    extract($_SESSION['user']);
}

$VIEW_NAME = "tai-khoan/cap-nhat-tk-form.php";
require '../layout.php';