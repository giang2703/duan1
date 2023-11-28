<?php
require_once "../../global.php"; // nhúng tẹp và truy cập đến các biến toàn cục
require "../../dao/loai.php"; // nhúng tẹp chứa các hàm liên quan đến loại hàng
if (isset($_GET['act'])) {

// kiểm tra tham số act trong url add tiến hành kt loại hàng  theo tên và mã
    if ($_GET['act'] == 'add') {
        $result = loai_exist_ten_loai_add($_GET['ten_loai']);//gọi hàm với tham số tên lh để kt sự tồn tại và trả về kết quả nếu tồn tại false 
        if ($result == true) {
            echo json_encode(false);
        } else {
            echo json_encode(true);
        }
    }
    //kiểm tra tham số act trong url add tiến hành kt hàng hàng hóa theo tên và mã
    if ($_GET['act'] == 'update') {
        // var_dump($_GET['ma_loai']);
        $result = loai_exist_ten_loai_update($_GET['ma_loai'], $_GET['ten_loai']);// gọi hàm với tham số mahh để kt sự tồn tại và trả về kq
        if ($result == true) {
            echo json_encode(false);
        } else {
            echo json_encode(true);
        }
    }
}
// sau khi kt đc sự tồn tại trả về kết quả json sẽ đc suae dụng trong js 