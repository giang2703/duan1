<?php
require_once 'pdo.php';
// Hàm thêm loại mới vào cơ sở dữ liệu
function loai_insert($ten_loai)
{
    $sql = "INSERT INTO loai(ten_loai) VALUES(?)";
    pdo_execute($sql, $ten_loai);
}
// Hàm cập nhật thông tin loại dựa trên mã loại
function loai_update($ma_loai, $ten_loai)
{
    $sql = "UPDATE loai SET ten_loai=? WHERE ma_loai=?";
    pdo_execute($sql, $ten_loai, $ma_loai);
}
// Hàm xóa loại dựa trên mã loại (hoặc mảng các mã loại)
function loai_delete($ma_loai)
{
    $sql = "DELETE FROM loai WHERE ma_loai=?";
    if (is_array($ma_loai)) {
        foreach ($ma_loai as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_loai);
    }
}
//Mặc định sắp xếp ngược/ truyền ASC vào thì xuôi

function loai_select_all($order = 'DESC')
{
    $sql = "SELECT * FROM loai ORDER BY ma_loai $order";
    return pdo_query($sql);
}
// Lấy thông tin loại dựa trên mã loại
function loai_select_by_id($ma_loai)
{
    $sql = "SELECT * FROM loai WHERE ma_loai=?";
    return pdo_query_one($sql, $ma_loai);
}
// Kiểm tra sự tồn tại của mã loại
function loai_exist($ma_loai)
{
    $sql = "SELECT count(*) FROM loai WHERE ma_loai=?";
    return pdo_query_value($sql, $ma_loai) > 0;
}
// Kiểm tra sự tồn tại của tên loại khi thêm mới
function loai_exist_ten_loai_add($ten_loai)
{
    $sql = "SELECT count(*) FROM loai WHERE ten_loai=?";
    return pdo_query_value($sql, $ten_loai) > 0;
}
// Kiểm tra sự tồn tại của tên loại khi cập nhật
function loai_exist_ten_loai_update($ma_loai, $ten_loai)
{
    $sql = "SELECT count(*) FROM loai WHERE  ma_loai!=? and ten_loai=?";
    return pdo_query_value($sql, $ma_loai, $ten_loai) > 0;
}