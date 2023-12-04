<?php
//tệp mã và thư viện 
//tệp mã chứa các biến toàn cục và chức năng chung. 
require_once "../../dao/pdo.php";
require_once "../../dao/loai.php";
require_once "../../dao/hang-hoa.php";
require "../../global.php";


check_login(); 


// chech_login();

extract($_REQUEST);// trích xuất tất cả các tham số  thành các biến riêng lẻ. 

if (exist_param("btn_list")) { //Đây là một điều kiện kiểm tra xem tham số "btn_list" có tồn tại



$items = hang_hoa_select_page('ma_hh', 10);

$VIEW_NAME = "list.php";

} else if (exist_param("btn_insert")) {

    
     #lấy dữ liệu từ form
    $ten_hh = $_POST['ten_hh'];
    $don_gia = $_POST['don_gia'];
    $giam_gia = $_POST['giam_gia'];
    $ma_loai = $_POST['ma_loai'];
    $dac_biet = $_POST['dac_biet'];
    $so_luot_xem = $_POST['so_luot_xem'];
    $mo_ta = $_POST['mo_ta'];
    $ngay_nhap = $_POST['ngay_nhap'];


    
    // Upload file lên host
    $hinh = save_file('hinh', "$UPLOAD_URL/products/");
    //insert vào db (thêm dữ liệu mới vào bảng)
    hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta);

    //show dữ liệu
    $items = hang_hoa_select_page('ma_hh', 10);
    $VIEW_NAME = "list.php"; 
} else if (exist_param("btn_edit")) { // thực hiện một hành cụ thể như sửa 

    #lấy dữ liệu từ form biểu mẩu 
    $ma_hh = $_REQUEST['ma_hh']; // lấy giá trị của tham số có tên ma_hh và gán cho biến $ma_hh
    $hang_hoa_info = hang_hoa_select_by_id($ma_hh); 

    // kết quả sẽ được gán vào $hang_hoa_info  
    extract($hang_hoa_info);

    $loai_hang = loai_select_all('ASC'); //gọi hàm loai_select_all lấy tất cả thông tin
    //show dữ liệu
    $VIEW_NAME = "edit.php"; 
} else if (exist_param("btn_delete")) {
    $ma_hh = $_REQUEST['ma_hh'];

    hang_hoa_delete($ma_hh);


    $items = hang_hoa_select_page('ma_hh', 10);
    $VIEW_NAME = "list.php";
} else if (exist_param("btn_delete_all")) { // thực hiện hành đọng xóa tất cả
    try {

        $arr_ma_hh = $_POST['ma_hh'];
        hang_hoa_delete($arr_ma_hh);
        $MESSAGE = "Xóa thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    $items = hang_hoa_select_page('ma_hh', 10);
    $VIEW_NAME = "list.php";
    
} else if (exist_param("btn_update")) {

    $ten_hh = $_POST['ten_hh'];
    $don_gia = $_POST['don_gia'];
    $giam_gia = $_POST['giam_gia'];
    $ma_loai = $_POST['ma_loai'];
    $dac_biet = $_POST['dac_biet'];
    $so_luot_xem = $_POST['so_luot_xem'];
    $mo_ta = $_POST['mo_ta'];
    $ngay_nhap = $_POST['ngay_nhap'];

    $up_hinh = save_file("up_hinh", "$UPLOAD_URL/products/"); // update hình ảnh 
    $hinh = strlen($up_hinh) > 0 ? $up_hinh : $hinh; // gán gias trị vào biến $hinh kt đk và gán giá tr tương ứng


    hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta);
    //hiển thị danh sách

    $items = hang_hoa_select_page('ma_hh', 10);
    $VIEW_NAME = "list.php";
} else {
    $loai_hang = loai_select_all('ASC');
    $VIEW_NAME = "add.php";
    // xử lý việc cập nhật hoặc thêm 
}
require "../layout.php";
//được sử dụng để nạp trang layout chung của ứng dụng để hiển thị nội dung tương ứng với biến 