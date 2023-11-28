<?php
require '../../global.php';
require '../../dao/tin-tuc.php';
require '../../dao/binh-luan.php';
//-------------------------------//

extract($_REQUEST);

// Truy vấn mặt hàng theo mã lấy nó ra để hiện thị
$tin_tuc = tin_tuc_select_by_id($ma);
extract($hang_hoa);

// Tăng số lượt xem lên 1
tin_tuc_tang_so_luot_xem($ma);

// Hàng cùng Loại
$tt_cung_loai = tin_tuc_select_by_loai($ma);

if (exist_param("noi_dung")) {
    $ma_kh = $_SESSION['user']['ma'];
    $ngay_bl = date_format(date_create(), 'Y-m-d');
    binh_luan_insert($ma_kh, $ma, $noi_dung, $ngay_bl, $rating);
}
// Lấy list bình luận ra
$binh_luan_list = binh_luan_select_by_hang_hoa($ma, 5);

$VIEW_NAME = "tin-tuc/chi-tiet-ui.php";
require '../layout.php';