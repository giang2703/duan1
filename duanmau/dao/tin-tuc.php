<?php
require_once 'pdo.php';
// Hàm thêm một sản phẩm hàng hóa mới vào cơ sở dữ liệu
function tin_tuc_insert($tieu_de, $noi_dung, $ngay, $hinh, $luot_xem, $ma_loai)
{
    $sql = "INSERT INTO tin_tuc(tieu_de, noi_dung, ngay, hinh, luot_xem, ma_loai) VALUES (?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $tieu_de, $noi_dung, $ngay, $hinh, $luot_xem, $ma_loai);
}
// Hàm cập nhật thông tin sản phẩm hàng hóa
function tin_tuc_update($tieu_de, $noi_dung, $ngay, $hinh, $luot_xem, $ma_loai)
{
    $sql = "UPDATE tin_tuc SET tieu_de=?, noi_dung=?, ngay=?, hinh=?, luot_xem=? WHERE ma_loai=?";
    pdo_execute($sql, $tieu_de, $noi_dung, $ngay, $hinh, $luot_xem, $ma_loai);
}
// Hàm xóa sản phẩm hàng hóa
function tin_tuc_delete($ma)
{
    $sql = "DELETE FROM tin_tuc WHERE ma=?";
    if (is_array($ma)) {
        foreach ($ma as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma);
    }
}
//hàm lấy danh sách tất cả hàng hóa
function tin_tuc_select_all()
{
    $sql = "SELECT * FROM tin_tuc ORDER BY ma desc";
    return pdo_query($sql);
}
// Hàm lấy thông tin sản phẩm hàng hóa dựa trên mã sản phẩm
function tin_tuc_select_by_id($ma)
{
    $sql = "SELECT * FROM tin_tuc WHERE ma=?";
    return pdo_query_one($sql, $ma);
}
// Hàm kiểm tra sự tồn tại của sản phẩm hàng hóa dựa trên mã sản phẩm
function hang_hoa_exist($ma)
{
    $sql = "SELECT count(*) FROM tin_tuc WHERE ma=?";
    return pdo_query_value($sql, $ma) > 0;
}
// Hàm kiểm tra sự tồn tại của sản phẩm hàng hóa dựa trên tên sản phẩm
function tin_tuc_exist_add($tieu_de)
{
    $sql = "SELECT count(*) FROM tin_tuc WHERE tieu_de=?";
    return pdo_query_value($sql, $tieu_de) > 0;
}
// Hàm kiểm tra sự tồn tại của sản phẩm hàng hóa khi cập nhật (tránh trùng tên khi cập nhật)
function tin_tuc_exist_update($ma, $tieu_de)
{
    $sql = "SELECT count(*) FROM tin_tuc WHERE ma!=? and tieu_de=?";
    return pdo_query_value($sql, $ma, $tieu_de) > 0;
}
// Hàm tăng số lượt xem của sản phẩm hàng hóa
function tin_tuc_tang_so_luot_xem($ma)
{
    $sql = "UPDATE tin_tuc SET luot_xem = luot_xem + 1 WHERE ma=?";
    pdo_execute($sql, $ma);
}
// Hàm lấy danh sách 10 sản phẩm có số lượt xem cao nhất
function tin_tuc_select_top10()
{
    $sql = "SELECT * FROM tin_tuc WHERE luot_xem > 0 ORDER BY luot_xem DESC LIMIT 0, 10";
    return pdo_query($sql);
}
// Hàm lấy danh sách các sản phẩm đặc biệt hoặc nổi bậ
function tin_tuc_select_dac_biet()
{
    $sql = "SELECT * FROM tin_tuc WHERE dac_biet=1";
    return pdo_query($sql);
}
// Hàm lấy danh sách sản phẩm hàng hóa dựa trên mã loại sản phẩm
function tin_tuc_select_by_loai($ma_loai)
{
    $sql = "SELECT * FROM tin_tuc WHERE ma_loai=?";
    return pdo_query($sql, $ma_loai);
}
// Hàm tìm kiếm sản phẩm hàng hóa dựa trên từ khóa
function tin_tuc_select_keyword($keyword)
{
    $sql = "SELECT * FROM tin_tuc tt "
        . " JOIN loai lo ON lo.ma_loai=tt.ma_loai "
        . " WHERE tieu_de LIKE ? OR ten_loai LIKE ?";
    return pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
}
// Hàm lấy danh sách sản phẩm hàng hóa theo phân trang và thứ tự sắp xếp
function tin_tuc_select_page($order, $limit)
{
    if (!isset($_REQUEST['page'])) {
        $_SESSION['page'] = 1;
    }
    if (!isset($_SESSION['total_page'])) {
        $_SESSION['total_page'] = 1;
    }
    $_SESSION['total_pro'] = pdo_query_value("SELECT count(*) FROM tin_tuc");
    if (exist_param("page")) {
        $_SESSION['page'] = $_REQUEST['page'];
    }
    $begin = ($_SESSION['page'] - 1) * $limit;
    $_SESSION['total_page'] = ceil($_SESSION['total_pro'] / $limit);
    $sql = "SELECT * FROM tin_tuc ORDER BY $order DESC LIMIT $begin,$limit";
    return pdo_query($sql);
}