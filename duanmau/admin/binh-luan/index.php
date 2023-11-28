<?php
//tệp mã và thư viện 
//tệp mã chứa các biến toàn cục và chức năng chung. 
require_once "../../dao/pdo.php";
require_once "../../dao/binh-luan.php";
require_once "../../dao/thong-ke.php";
//Dòng cuối cùng gọi một tệp mã chứa giao diện người dùng (layout).
require "../../global.php";
check_login(); // kiểm tra xem người dùng đã đăng nhập hay ch nếu ch thì chuyển đến trang đăng nhập

extract($_REQUEST); //: Dòng mã này trích xuất tất cả các tham số  thành các biến riêng lẻ. 
//Điều này làm cho việc truy cập dữ liệu dễ dàng hơn.
if (exist_param("ma_hh")) { // thành các biến riêng lẻ. Điều này làm cho việc truy cập dữ liệu dễ dàng hơn.

    if (exist_param("btn_delete")) { // kiểm tra nếu đã có ma_bl thì thực 
        try {
            binh_luan_delete($ma_bl); 
            $MESSAGE = "Xóa thành công";
        } catch (Exception $exc) {
            $MESSAGE = "Xóa thất bại";
        }
    } else if (exist_param("btn_delete_all")) {
        try {
            $arr_ma_bl = $_POST['ma_bl'];
            binh_luan_delete($arr_ma_bl);
            $MESSAGE = "Xóa thành công!";
        } catch (Exception $exc) {
            $MESSAGE = "Xóa thất bại!";
        }
        // $items = binh_luan_select_by_hang_hoa($ma_hh);
        $VIEW_NAME = "detail.php";
    }

    $items = binh_luan_select_by_hang_hoa($ma_hh); // tải csdl bằng cách gọi hàm 
// hoặc bằng cách thống kê bình luận 
    if (count($items) == 0) {
        $items = thong_ke_binh_luan(); 
        $VIEW_NAME = "list.php";
    } else {
        $VIEW_NAME = "detail.php";
    }
} else {
    $items = thong_ke_binh_luan();
    $VIEW_NAME = "list.php";
}

require "../layout.php";
//Dòng cuối cùng gọi một tệp mã giao diện để hiển thị dữ liệu trên trang web.

// mã này quản lý bình luận trên trang web, 
// cho phép xóa bình luận cá nhân hoặc nhiều bình luận cùng lúc và 
// hiển thị thông tin chi tiết hoặc danh sách bình luận tùy theo tình huống.