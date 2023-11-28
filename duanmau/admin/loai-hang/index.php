<?php
// nhúng tệp
require_once "../../dao/pdo.php";
require_once "../../dao/loai.php";
require "../../global.php";
check_login();


// chech_login();

extract($_REQUEST);
if (exist_param("btn_list")) {//iểm tra xem một tham số có tồn tại trong yêu cầu (request) hay không. Trong trường hợp này, nó kiểm tra tham số "btn_list" có tồn tại.

    //show dữ liệu
    $items = loai_select_all();
    $VIEW_NAME = "list.php";
} else if (exist_param("btn_insert")) {
    #lấy dữ liệu từ form

    //insert vào db
    loai_insert($ten_loai);

    //show dữ liệu
    $items = loai_select_all();
    $VIEW_NAME = "list.php";
} else if (exist_param("btn_edit")) {
    #lấy dữ liệu từ form
    $ma_loai = $_REQUEST['ma_loai'];
    $loai_info = loai_select_by_id($ma_loai);
    extract($loai_info);

    //show dữ liệu
    $items = loai_select_all();
    $VIEW_NAME = "edit.php";
} else if (exist_param("btn_delete")) {

    $ma_loai = $_REQUEST['ma_loai'];
    loai_delete($ma_loai);
    //hiển thị danh sách

    $items = loai_select_all();
    $VIEW_NAME = "list.php";
} else if (exist_param("btn_delete_all")) {
    try {
        $arr_ma_loai = $_POST['ma_loai'];
        loai_delete($arr_ma_loai);
        $MESSAGE = "Xóa thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    $items = loai_select_all();
    $VIEW_NAME = "list.php";
} else if (exist_param("btn_update")) {

    $ma_loai = $_POST['ma_loai']; // cập nhật
    $ten_loai = $_POST['ten_loai'];
    loai_update($ma_loai, $ten_loai);
    //hiển thị danh sách
    // gán "loai_select_add" cho $items
    $items = loai_select_all();
    $VIEW_NAME = "list.php";
} else {
    $VIEW_NAME = "add.php";
}
require "../layout.php";
//được sử dụng để nạp trang layout chung của ứng dụng để hiển thị nội dung tương ứng với biến 