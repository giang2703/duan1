<?php
//tệp mã và thư viện 
//tệp mã chứa các biến toàn cục và chức năng chung. 
require_once "../../dao/pdo.php";
require_once "../../dao/loai.php";
require_once "../../dao/hang-hoa.php";
require "../../global.php";
//Dòng cuối cùng gọi một tệp mã chứa giao diện người dùng (layout).

check_login(); // kiểm tra xem người dùng đã đăng nhập hay ch nếu ch thì chuyển đến trang đăng nhập


// chech_login();

extract($_REQUEST);// trích xuất tất cả các tham số  thành các biến riêng lẻ. 
//Điều này làm cho việc truy cập dữ liệu dễ dàng hơn.
if (exist_param("btn_list")) { //Đây là một điều kiện kiểm tra xem tham số "btn_list" có tồn tại
//Trong trường hợp này, mã sẽ thực hiện các thao tác để hiển thị danh sách sản phẩm (hàng hóa).

    //show dữ liệu
    $items = hang_hoa_select_page('ma_hh', 10);
    //hang_hoa_select_page() để lấy danh sách sản phẩm (hàng hóa) từ cơ sở dữ liệu. 
    //Nó sử dụng "ma_hh" làm trường sắp xếp và giới hạn kết quả trả về thành 10 sản phẩm. 
    //Dữ liệu này sau đó được gán vào biến $items để sử dụng trong việc hiển thị.
    $VIEW_NAME = "list.php";
    //được thiết lập thành "list.php". Điều này ngụ ý rằng trang web sẽ hiển thị giao diện "list.php" để hiển thị danh sách sản phẩm.
} else if (exist_param("btn_insert")) {
    //Đây là một phần khác của điều kiện. 
    //Nếu tham số "btn_insert" tồn tại, điều này ngụ ý rằng người dùng đã thực hiện một hành động khác, chẳng hạn như bấm nút "Thêm mới" 
    //để thêm sản phẩm. Các hành động liên quan đến việc thêm mới sản phẩm sẽ được thực hiện trong phần mã sau đây.
   
     #lấy dữ liệu từ form
    $ten_hh = $_POST['ten_hh'];
    $don_gia = $_POST['don_gia'];
    $giam_gia = $_POST['giam_gia'];
    $ma_loai = $_POST['ma_loai'];
    $dac_biet = $_POST['dac_biet'];
    $so_luot_xem = $_POST['so_luot_xem'];
    $mo_ta = $_POST['mo_ta'];
    $ngay_nhap = $_POST['ngay_nhap'];
    //cả hai phần này tương ứng với hai tình huống khác nhau: 
    //hiển thị danh sách sản phẩm hoặc thực hiện thêm mới sản phẩm, dựa vào tham số truyền vào tử yêu cầu giao thức truyền tải siêu văn bản http

    
    // Upload file lên host
    $hinh = save_file('hinh', "$UPLOAD_URL/products/");
    //insert vào db (thêm dữ liệu mới vào bảng)
    hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta);

    //show dữ liệu
    $items = hang_hoa_select_page('ma_hh', 10);
    $VIEW_NAME = "list.php"; 
} else if (exist_param("btn_edit")) { // thực hiện một hành cụ thể như sửa 
    // cho phép sử dụng các hàng động sửa đổi là nơi người có thể thực hiện các hành động khác nhau thông qua giao diện
    #lấy dữ liệu từ form biểu mẩu 
    $ma_hh = $_REQUEST['ma_hh']; // lấy giá trị của tham số có tên ma_hh và gán cho biến $ma_hh
    $hang_hoa_info = hang_hoa_select_by_id($ma_hh); // lấy thông tin về về hh 
    // lấy giá ma_hh để gọi hàm hang_hoa_select_by_id để lấy thông tin từ csdl
    // kết quả sẽ được gán vào $hang_hoa_info  
    extract($hang_hoa_info); // trích xuất các phần tử mảng $hang_hoa_info thành các phần tử riêng lê -> truy cập thông tin dễ dnagf hơn

    $loai_hang = loai_select_all('ASC'); //gọi hàm loai_select_all lấy tất cả thông tin
    //show dữ liệu
    $VIEW_NAME = "edit.php"; // hiển thị trang 
} else if (exist_param("btn_delete")) {// thực hiện một hành cụ thể như xóa
    // cho phép sử dụng các hàng động sửa đổi là nơi người có thể thực hiện các hành động khác nhau thông qua giao diện

    $ma_hh = $_REQUEST['ma_hh'];
    //thực hiện việc xóa một hàng hóa hoặc sản phẩm từ cơ sở dữ liệu dựa trên giá trị của biến $ma_hh.
    hang_hoa_delete($ma_hh);
    //thực hiện việc xóa một hàng hóa hoặc sản phẩm từ cơ sở dữ liệu dựa trên giá trị của biến $ma_hh.
    //hiển thị danh sách

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
    //Đoạn mã trên dùng để xóa hàng hóa từ cơ sở dữ liệu dựa trên danh sách mã hàng hóa được gửi từ biểu mẫu HTML, 
    //và sau đó hiển thị danh sách còn lại sau khi xóa.
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