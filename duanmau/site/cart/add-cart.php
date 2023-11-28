<?php
//Import tất cả file và thư viện cần thiết
require '../../global.php'; // Import file global.php chứa các biến toàn cục và cài đặt
require '../../dao/hang-hoa.php';  // Import file dao/hang-hoa.php để sử dụng các hàm liên quan đến sản phẩm
//Trích xuất thông tin từ request (biến $_REQUEST) và các biến cần thiết
extract($_REQUEST); // Trích xuất tất cả thông tin từ request (GET và POST) thành các biến địa phương
//Kiểm tra nếu tồn tại mã sản phẩm ($id) và $id lớn hơn 0
if (isset($id) && $id > 0) {
    //Lấy thông tin sản phẩm theo mã sản phẩm
    $items = hang_hoa_select_by_id($id);
    $total = 0; // Khởi tạo biến total để tính tổng số lượng sản phẩm trong giỏ hàng
    
    extract($items);//Trích xuất thông tin sản phẩm

    //Kiểm tra nếu giỏ hàng đã tồn tại trong session
    if (isset($_SESSION['cart'])) {
        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        if (isset($_SESSION['cart'][$id]['sl'])) {
            $_SESSION['cart'][$id]['sl'] += 1; // Tăng số lượng sản phẩm lên 1
        } else {
            $_SESSION['cart'][$id]['sl'] = 1; // Khởi tạo số lượng sản phẩm là 1
        }

        //Lưu thông tin sản phẩm vào giỏ hàng
        $_SESSION['cart'][$id]['ten_hh'] = $ten_hh;
        // $_SESSION['cart'][$id]['hinh'] = $hinh;
        $_SESSION['cart'][$id]['don_gia'] = $don_gia;
        $_SESSION['cart'][$id]['giam_gia'] = $giam_gia;

        //Tính tổng số lượng sản phẩm trong giỏ hàng
        foreach ($_SESSION['cart'] as $key => $value) {
            $total += $_SESSION['cart'][$key]['sl'];
        }
        echo $total; // In ra tổng số lượng sản phẩm trong giỏ hàng
    } else { // Nếu giỏ hàng chưa tồn tại trong session
        $_SESSION['cart'][$id]['sl'] = 1; // Khởi tạo số lượng sản phẩm là 1
        $_SESSION['cart'][$id]['ten_hh'] = $ten_hh;
        // $_SESSION['cart'][$id]['hinh'] = $hinh;
        $_SESSION['cart'][$id]['don_gia'] = $don_gia;
        $_SESSION['cart'][$id]['giam_gia'] = $giam_gia;

        //Tính tổng số lượng sản phẩm trong giỏ hàng
        foreach ($_SESSION['cart'] as $key => $value) {
            $total += $_SESSION['cart'][$key]['sl'];
        }
        echo $total; // In ra tổng số lượng sản phẩm trong giỏ hàng
    }
    //Lưu tổng số lượng sản phẩm trong giỏ hàng vào session
    $_SESSION['total_cart'] = $total;
    
    //Chuyển hướng (redirect) đến trang hiển thị giỏ hàng
    header("location:" . $SITE_URL . "/cart/list-cart.php");
}