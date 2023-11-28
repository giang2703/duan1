<?php
//tệp mã và thư viện 
//tệp mã chứa các biến toàn cục và chức năng chung. 
require_once "../../dao/pdo.php";
require_once "../../dao/khach-hang.php";
require "../../global.php";
//Dòng cuối cùng gọi một tệp mã chứa giao diện người dùng (layout).
check_login();//kiểm tra xem người dùng đã đăng nhập hay ch nếu ch thì chuyển đến trang đăng nhập

extract($_REQUEST);// trích xuất tất cả các tham số  thành các biến riêng lẻ. 
//Điều này làm cho việc truy cập dữ liệu dễ dàng hơn.
if (exist_param("btn_list")) {//Đây là một điều kiện kiểm tra xem tham số "btn_list" có tồn tại
    //Trong trường hợp này, mã sẽ thực hiện các thao tác để hiển thị danh sách khách hàng.

    //show dữ liệu
    $items = khach_hang_select_all();
    //dùng để truy vấn và lấy tất cả thông tin về khách hàng từ cơ sở dữ liệu và lưu chúng vào biến $items
    $VIEW_NAME = "list.php";
} else if (exist_param("btn_insert")) {
    #lấy dữ liệu từ form
    $ma_kh = $_POST['ma_kh'];
    $ho_ten = $_POST['ho_ten'];
    $mat_khau = $_POST['mat_khau'];
    $email = $_POST['email'];
    $kich_hoat = $_POST['kich_hoat'];
    $vai_tro = $_POST['vai_tro'];
    // Upload file lên host
    $hinh = save_file('hinh', "$UPLOAD_URL/users");
    //insert vào db
    khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);

    //show dữ liệu
    $items = khach_hang_select_all();
    $VIEW_NAME = "list.php";
} else if (exist_param("btn_edit")) {
    #lấy dữ liệu từ form
    $ma_kh = $_REQUEST['ma_kh'];
    $khach_hang_info = khach_hang_select_by_id($ma_kh);
    extract($khach_hang_info);

    //show dữ liệu
    $items = khach_hang_select_all();
    $VIEW_NAME = "edit.php";
} else if (exist_param("btn_delete")) {

    $ma_kh = $_REQUEST['ma_kh'];
    khach_hang_delete($ma_kh);
    //hiển thị danh sách

    $items = khach_hang_select_all();
    $VIEW_NAME = "list.php";
} else if (exist_param("btn_delete_all")) { // thực hiện hành đọng xóa tất cả
    try {
        $arr_ma_kh = $_POST['ma_kh'];
        khach_hang_delete($arr_ma_kh);
        $MESSAGE = "Xóa thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    $items = khach_hang_select_all();
    $VIEW_NAME = "list.php";
} else if (exist_param("btn_update")) {

    $ma_kh = $_POST['ma_kh'];
    $ho_ten = $_POST['ho_ten'];
    $mat_khau = $_POST['mat_khau'];
    $email = $_POST['email'];
    $kich_hoat = $_POST['kich_hoat'];
    $vai_tro = $_POST['vai_tro'];


    $up_hinh = save_file("up_hinh", "$UPLOAD_URL/users/"); // update hình ảnh
    $hinh = strlen($up_hinh) > 0 ? $up_hinh : $hinh; // gán gias trị vào biến $hinh kt đk và gán giá tr tương ứng

    khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);
    // khach_hang_update();
    //hiển thị danh sách

    $items = khach_hang_select_all();
    $VIEW_NAME = "list.php";
} else {
    $VIEW_NAME = "add.php";
}
require "../layout.php";
//được sử dụng để nạp trang layout chung của ứng dụng để hiển thị nội dung tương ứng với biến 