<?php
require_once 'pdo.php';
// Hàm thêm một sản phẩm hàng hóa mới vào cơ sở dữ liệu
function hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta)
{
    $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, giam_gia, hinh, ma_loai, dac_biet, so_luot_xem, ngay_nhap, mo_ta) VALUES (?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet == 1, $so_luot_xem, $ngay_nhap, $mo_ta);
}
// Hàm cập nhật thông tin sản phẩm hàng hóa
function hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta)
{
    $sql = "UPDATE hang_hoa SET ten_hh=?, don_gia=?, giam_gia=?, hinh=?, ma_loai=?, dac_biet=?, so_luot_xem=?, ngay_nhap=?, mo_ta=? WHERE ma_hh=?";
    pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet == 1, $so_luot_xem, $ngay_nhap, $mo_ta, $ma_hh);
}
// Hàm xóa sản phẩm hàng hóa
function hang_hoa_delete($ma_hh)
{
    $sql = "DELETE FROM hang_hoa WHERE ma_hh=?";
    if (is_array($ma_hh)) {
        foreach ($ma_hh as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_hh);
    }
}  
//hàm lấy danh sách tất cả hàng hóa
function hang_hoa_select_all()
{
    $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh desc";
    return pdo_query($sql);
}
// Hàm lấy thông tin sản phẩm hàng hóa dựa trên mã sản phẩm
function hang_hoa_select_by_id($ma_hh)
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_hh=?";
    return pdo_query_one($sql, $ma_hh);
}
// Hàm kiểm tra sự tồn tại của sản phẩm hàng hóa dựa trên mã sản phẩm
function hang_hoa_exist($ma_hh)
{
    $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
    return pdo_query_value($sql, $ma_hh) > 0;
}
// Hàm kiểm tra sự tồn tại của sản phẩm hàng hóa dựa trên tên sản phẩm
function hang_hoa_exist_add($ten_hh)
{
    $sql = "SELECT count(*) FROM hang_hoa WHERE ten_hh=?";
    return pdo_query_value($sql, $ten_hh) > 0;
}
// Hàm kiểm tra sự tồn tại của sản phẩm hàng hóa khi cập nhật (tránh trùng tên khi cập nhật)
function hang_hoa_exist_update($ma_hh, $ten_hh)
{
    $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh!=? and ten_hh=?";
    return pdo_query_value($sql, $ma_hh, $ten_hh) > 0;
}
// Hàm tăng số lượt xem của sản phẩm hàng hóa
function hang_hoa_tang_so_luot_xem($ma_hh)
{
    $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
    pdo_execute($sql, $ma_hh);
}
// Hàm lấy danh sách 10 sản phẩm có số lượt xem cao nhất
function hang_hoa_select_top10()
{
    $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
    return pdo_query($sql);
}
// Hàm lấy danh sách các sản phẩm đặc biệt hoặc nổi bậ
function hang_hoa_select_dac_biet()
{
    $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
    return pdo_query($sql);
}
// Hàm lấy danh sách sản phẩm hàng hóa dựa trên mã loại sản phẩm
function hang_hoa_select_by_loai($ma_loai)
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
    return pdo_query($sql, $ma_loai);
}
// Hàm tìm kiếm sản phẩm hàng hóa dựa trên từ khóa
function hang_hoa_select_keyword($keyword)
{
    $sql = "SELECT * FROM hang_hoa hh "
        . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
        . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
    return pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
}
// Hàm lấy danh sách sản phẩm hàng hóa theo phân trang và thứ tự sắp xếp
function hang_hoa_select_page($order, $limit)
{
    if (!isset($_REQUEST['page'])) {
        $_SESSION['page'] = 1;
    }
    if (!isset($_SESSION['total_page'])) {
        $_SESSION['total_page'] = 1;
    }
    $_SESSION['total_pro'] = pdo_query_value("SELECT count(*) FROM hang_hoa");
    if (exist_param("page")) {
        $_SESSION['page'] = $_REQUEST['page'];
    }
    $begin = ($_SESSION['page'] - 1) * $limit;
    $_SESSION['total_page'] = ceil($_SESSION['total_pro'] / $limit);
    $sql = "SELECT * FROM hang_hoa ORDER BY $order DESC LIMIT $begin,$limit";
    return pdo_query($sql);
}