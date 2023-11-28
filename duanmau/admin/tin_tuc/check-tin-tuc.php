<?php
require_once "../../global.php"; // nhúng tẹp và truy cập đến các biến toàn cục
require "../../dao/tin-tuc.php"; // nhúng tẹp chứa các hàm liên quan đến hàng hóa

// kiểm tra tham số act trong url add tiến hành kt hàng hàng hóa theo tên và mã
if (isset($_GET['act']) && ($_GET['act'] == 'add')) { 
    $result = hang_hoa_exist_add($_GET['tieu_de']); //gọi hàm với tham số tên hh để kt sự tồn tại và trả về kết quả
    if ($result == true) {
        echo json_encode(false);
    } else {
        echo json_encode(true);
    }
}

// kiểm tra tham số act trong url add tiến hành kt hàng hàng hóa theo tên và mã
if (isset($_GET['act']) && ($_GET['act'] == 'update')) {


    // var_dump($ma_hh['ma_hh']);
    $result = hang_hoa_exist_update($_GET['ma'], $_GET['tieu_=de']); // gọi hàm với tham số mahh để kt sự tồn tại và trả về kq
    if ($result == true) {
        echo json_encode(false);
    } else {
        echo json_encode(true);
    }
}
// sau khi kt đc sự tồn tại trả về kết quả json sẽ đc suae dụng trong js 