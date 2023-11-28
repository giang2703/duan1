<?php
require '../../global.php'; // Kết nối với tệp tin global.php, chứa các thiết lập toàn cục cho ứng dụng
require '../../dao/hang-hoa.php'; // Kết nối với tệp tin chứa các hàm xử lý dữ liệu liên quan đến sản phẩm
require '../../dao/khach-hang.php'; // Kết nối với tệp tin chứa các hàm xử lý dữ liệu liên quan đến khách hàng

//-------------------------------//

// Trích xuất các tham số từ request
extract($_REQUEST);
// var_dump($_REQUEST);
// die;
if (exist_param("form_invoice")) {
    // Kiểm tra nếu người dùng đã đăng nhập
    if (isset($_SESSION['user'])) {
        // Lấy thông tin của người dùng đã đăng nhập từ session
        $id = $_SESSION['user'];
        $kh = khach_hang_select_by_id($id['ma_kh']);
        // Trích xuất thông tin khách hàng từ kết quả truy vấn
        extract($kh);
        $VIEW_NAME = "../cart/form-invoice.php";
    } else {
        // Nếu chưa đăng nhập, chuyển hướng người dùng đến trang đăng nhập
        header("location:" . $SITE_URL . "/tai-khoan/dang-nhap.php");
    }
} else {
    $VIEW_NAME = "../cart/cart.php";
}
require '../layout.php';