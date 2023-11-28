<?php
// Bước 1: Import các file và biến global
require '../../global.php';
extract($_REQUEST);

// Bước 2: Kiểm tra xem giỏ hàng trong session có sản phẩm không
if (empty($_SESSION['cart'])) {
    // Nếu giỏ hàng trống, chuyển hướng người dùng đến trang giỏ hàng
    header("location:" . $SITE_URL . "/cart/list-cart.php");
} else {
    // Nếu giỏ hàng có sản phẩm, xử lý các tương tác

    if ($act == "deleteAll") {
        // Bước 3: Xóa tất cả sản phẩm khỏi giỏ hàng
        unset($_SESSION['cart']); // Xóa dữ liệu giỏ hàng
        unset($_SESSION['total_cart']);// Đặt lại tổng số sản phẩm trong giỏ hàng
        header("location:" . $SITE_URL . "/cart/list-cart.php"); // Chuyển hướng người dùng đến trang giỏ hàng
    } else if ($act == "delete") {
        //Bước 4: Xóa một sản phẩm cụ thể khỏi giỏ hàng
        if (array_key_exists($id, $_SESSION['cart'])) {

            $_SESSION['total_cart'] -=   $_SESSION['cart'][$id]['sl'];// Cập nhật tổng số sản phẩm trong giỏ hàng
            unset($_SESSION['cart'][$id]); // Xóa sản phẩm cụ thể
            header("location:" . $SITE_URL . "/cart/list-cart.php");// Chuyển hướng người dùng đến trang giỏ hàng
        }
    } else if ($act == "update_sl") {
        // Bước 5: Cập nhật số lượng sản phẩm trong giỏ hàng
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($key == $_POST['ma_hh']) {
                $_SESSION['cart'][$key]['sl'] = $_POST['update_sl']; // Cập nhật số lượng sản phẩm
            }
        }
        header("location:" . $SITE_URL . "/cart/list-cart.php"); // Chuyển hướng người dùng đến trang giỏ hàng
    } else {
        header("location:" . $SITE_URL . "/cart/list-cart.php");// Chuyển hướng người dùng đến trang giỏ hàng nếu không xác định được hành động
    }
}