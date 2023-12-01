<style>
        /* CSS để tạo kiểu cho danh sách */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1300px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 15px;
            text-align: center;  
            font-weight: bold; 
            color: #C19FD6 ;  
        }

        .btn-success,
        .btn-primary,
        .btn-danger{
            color: #333;
            background-color: #fff;
            border: 1px solid #B495C9;
        }

        .btn-success:hover,
        .btn-primary:hover,
        .btn-danger:hover {
            background-color: #B495C9;
            border: 1px solid #B495C9;

        }

    </style>

<div class="container mt-2">
<div class="row">
    <div class="col-lg-12">

    <h2>Thêm mới tin tức</h2>
            <div class="card-body">
                <form action="index.php" method="POST" enctype="multipart/form-data" id="add_tin_tuc">
                    <!--  action="index.php"xác định URL mà biểu mẫu sẽ được gửi đến khi người dùng nhấn nút gửi (Submit).-->
                    <!-- method="POSTxác định phương thức gửi dữ liệu post cho phép gửi dữ liệu ẩn an toàn -->
                    <!-- enctype="multipart/form-data": Thuộc tính enctype xác định loại mã hóa dữ liệu khi gửi biểu mẫu -->
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="ma_loai" class="form-label">Loại Tin tức </label>
                            <!-- được sử dụng để đặt tên hoặc mô tả cho trường nhập liệu.  -->
                            <select name="ma_loai" class="form-control" id="ma_loai">
                                <!--  có thể chọn một loại hàng hóa từ danh sách -->
                                <!-- name="ma_loai" xác định được tên trường khi giá trị được gửi lên máy chủ -->
                                <?php

                                foreach ($loai_hang as $loai_hang) { // vòng lặp duyệt qua mảng $loai_hang
                                    extract($loai_hang); // trích xuất các phần tử trong mảng thành biến maloai và tenloai
                                    echo '<option value="' . $ma_loai . '">' . $ten_loai . '</option>';
                                    // giá trị value đc thiệt lập maloai sẽ đc gửi lên máy chủ 
                                }
                                //Vòng lặp này sẽ duyệt qua mảng $loai_hang và tạo một tùy chọn <option> 
                                //cho mỗi loại hàng hóa có trong mảng. Kết quả là, danh sách loại hàng hóa 
                                //sẽ chứa tất cả các tùy chọn được tạo từ mảng $loai_hang.

                                ?>

                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <!-- cho phép người dùng nhập tên hàng hóa và giá trị sẽ đc gửi về máy chủ-->
                            <label for="tieu_de" class="form-label">Tiêu đề tin tức</label>
                            <input type="text" name="tieu_de" id="tieu_de" class="form-control"> 
                            <!-- trường nhập liệu  -->
                        </div>
                        <!--Trường nhập liệu này sẽ hiển thị giá trị mã hàng hóa là "auto number" 
                        và người dùng không thể thay đổi giá trị của nó, nó có thể được sử dụng để 
                        hiển thị thông tin không thay đổi hoặc tự động tạo ra.  -->
                        <div class="form-group col-sm-4">
                            <label for="ma" class="form-label">Mã tin tức</label>
                            <input type="text" name="ma" id="ma" readonly class="form-control"
                                value="auto number">
                        </div>
                    </div>
                    <!-- cho phép người dùng tải hình ảnh sản phẩm lên web -->
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="hinh" class="form-label">Ảnh tin tức</label>
                            <input type="file" name="hinh" id="hinh" class="form-control">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="mo_ta" class="form-label">Mô tả</label>
                            <textarea id="txtarea" spellcheck="false" name="mo_ta"
                                class="form-control form-control-lg mb-3" id="textareaExample" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row">


                                        
                    <div class="form-group col-sm-6">
                        <!-- lấy ngày hiện tại và định dạng nó thành chuỗi theo định dạng 'Y-m-d' (năm-tháng-ngày). 
                        Kết quả được lưu trong biến $today để sử dụng làm giá trị mặc định cho trường nhập liệu ngày. -->
                        <?php $today = date_format(date_create(), 'Y-m-d'); ?>
                        <label for="ngay" class="form-label">Ngày nhập</label>
                        <input type="date" name="ngay" id="ngay" class="form-control"
                            value="<?= $today ?>">
                            <!-- tức là ngày hiện tại được hiển thị là giá trị mặc định khi trang web được tải. 
                            Người dùng có thể thay đổi ngày này nếu cần. -->
                    </div>
                    <!-- hiển thị lượt xem  -->
                    <div class="form-group col-sm-6">
                        <label for="luot_xem" class="form-label">Số lượt xem</label>
                        <input type="text" name="luot_xem" id="luot_xem" readonly class="form-control"
                            value="0">
                    </div>
                    </div>
                    <!-- nội dung -->
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="noi_dung" class="form-label">Nội dung</label>
                            <textarea id="txtarea" spellcheck="false" name="noi_dung"
                                class="form-control form-control-lg mb-3" id="textareaExample" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 text-center">
                        <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                        <!-- nút reset để nhập lại nút này sẽ xóa toàn bộ dữ liệu người đã nhập vào biểu mẫu -->
                        <input type="submit" name="btn_insert" value="Thêm mới" class="btn btn-primary mr-3">
                        <!-- nút submit để thêm dữ liệu ddax nhập ở biểu mẫu lên máy chủ và sẻ lý dữ liệu -->
                        <a href="index.php?btn_list"><input type="button" class="btn btn-success" value="Danh sách"></a>
                        <!-- liên kết đến trang danh sách hàng hóa  -->
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>