<?php
// câu lệnh kết nối file
//tệp chứa các chức năng tương tác với cơ sở dữ liệu.
require_once "../../global.php";
require_once "../../dao/thong-ke.php";

check_login(); // kt người đã đăng nhập hay ch nếu thì chuyển đến trang đăng nhập


if (exist_param("chart")) { // kt xem chart đã tham gia trong chuỗi truy vấn hay kh
    $VIEW_NAME = "chart.php"; // nếu đúng 
} else {
    $VIEW_NAME = "list.php"; // nếu sai
}
$items = thong_ke_hang_hoa(); // hàm thực hiện các tính toán thống kê và trả về dl liên quan 
require "../layout.php";
//Cuối cùng, dòng này kết nối tới một file giao diện chung (layout) để hiển thị nội dung.