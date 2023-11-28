<?php
session_start();
/**
 * Định nghĩa các url cần thiết sử dụng trong website
 */
$ROOT_URL = "/duanmau";
$CONTENT_URL = "$ROOT_URL/content";
$ADMIN_URL = "$ROOT_URL/admin";
$SITE_URL = "$ROOT_URL/site";
$SL_PER_PAGE = 10;

//Định nghĩa đường dẫn chứa ảnh trong upload

$UPLOAD_URL = "../../uploaded";

/**
 * Biến toàn cục cần thiết để chia sẻ giữa controller và view
 */
$VIEW_NAME = 'index.php';
$MESSAGE = '';

// Kiểm tra biến có tồn tại trong $_REQUEST hay ko?
function exist_param($fieldname)
{
    return array_key_exists($fieldname, $_REQUEST);
}

/**
 * Lưu file upload vào thư mục 
 */
// Hàm xử lý tải lên và lưu trữ tệp tin
function save_file($fieldname, $target_dir)
{
    // Lấy thông tin về tệp tin đã được tải lên
    $file_uploaded = $_FILES[$fieldname];
    // Lấy tên của tệp tin
    $file_name = basename($file_uploaded['name']);
    // Xác định đường dẫn lưu trữ tệp tin đích
    $target_path = $target_dir . $file_name;
    // Di chuyển tệp tin tải lên vào đường dẫn đích
    move_uploaded_file($file_uploaded['tmp_name'], $target_path);
    // Trả về tên của tệp tin đã được lưu trữ
    return $file_name;
}

/**
 * Tạo cookies 
 */
// Hàm thêm cookie
function add_cookie($name, $value, $day)
{
    // Sử dụng hàm setcookie để tạo một cookie với tên $name và giá trị $value
    // Cookie sẽ tồn tại trong $day ngày kể từ thời điểm hiện tại
    // Cookie có thể được truy cập trên toàn bộ trang web ("/")
    setcookie($name, $value, time() + (86400 * $day), "/");
}
/**
 * Xóa cookies 
 */

function delete_cookie($name)
{
    add_cookie($name, "", -1);
}

/**
 * ĐỌc giá trị cookie
 */

function get_cookie($name)
{
    return $_COOKIE[$name] ?? '';
}
/**
 * Check login  
 */
// Hàm kiểm tra đăng nhập
function check_login()
{
    global $SITE_URL;
     // Kiểm tra xem người dùng đã đăng nhập chưa
    if (isset($_SESSION['user'])) {
        // Nếu người dùng có vai trò là người quản trị (vai_tro == 1)
        if ($_SESSION['user']['vai_tro'] == 1) {
            return;// Không thực hiện kiểm tra tiếp, cho phép truy cập
        }
        // Nếu không phải là người quản trị và đang truy cập trang quản trị (/admin/),
        // thì chuyển hướng về trang chủ
        if (strpos($_SERVER['REQUEST_URI'], '/admin/') == false) {
            return; // Cho phép truy cập
        }
    }
     // Nếu người dùng chưa đăng nhập hoặc không có quyền truy cập trang quản trị,
    // chuyển hướng về trang đăng nhập và dừng chương trình
    $_SESSION['name_page'] = 'trang_chu';
    header("location: $SITE_URL/tai-khoan/dang-nhap.php");
    die;
}
