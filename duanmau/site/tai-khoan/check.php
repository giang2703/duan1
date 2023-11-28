<?php
require '../../global.php';
require '../../dao/khach-hang.php';
if (isset($_GET['ma_kh'])) {

    $result = khach_hang_exist($_GET['ma_kh']);
    if ($result == true) {
        echo json_encode(false);
    } else {
        echo json_encode(true);
    }
}
if (isset($_GET['email'])) {
    $result = khach_hang_exist_email($_GET['email']);
    if ($result == true) {
        echo json_encode(false);
    } else {
        echo json_encode(true);
    }
}
if (isset($_POST['ma_kh'])) {
    # code...
    $result = khach_hang_exist($_POST['ma_kh']);
    if ($result == true) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}