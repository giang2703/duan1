<?php
// Xây dựng đường dẫn tới tệp hình ảnh
$img_path = $UPLOAD_URL . '/products/' . $hinh;
// Kiểm tra xem tệp hình ảnh tại đường dẫn $img_path có tồn tại hay không
if (is_file($img_path)) {  //kt tệp hình ảnh tại đg dẫn $img_path có tồn tại hay k
    // Nếu tệp hình ảnh tồn tại, tạo một thẻ <img> để hiển thị hình ảnh
    $img = "<img src='$img_path' height='80'>";
} else {
    // Nếu tệp hình ảnh không tồn tại, đặt biến $img thành chuỗi "no photo"
    $img = "no photo";
}

?>

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
            margin-bottom: 20px;
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

    <h2>Cập nhật tin tức</h2>
            <div class="card-body">
                <form action="index.php?btn_update" method="POST" enctype="multipart/form-data" id="update_tin_tuc">
                    <!-- xác định URL "index.php?btn_update" cho action của biểu mẫu được gửi đến khi nó được submit và cấu hình biểu mẫu để gửi dữ liệu 
                    dưới dạng POST với kiểu dữ liệu "multipart/form-data". -->
                    <!-- method="POSTxác định phương thức gửi dữ liệu post cho phép gửi dữ liệu ẩn an toàn -->
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="ma_loai" class="form-label">Loại tin tức</label>
                            <select name="ma_loai" class="form-control" id="ma_loai">
                                <?php

                                foreach ($loai_hang as $loai_hang) {//lặp qua các ptu trong mảng $loai_hang
                                    extract($loai_hang);    //chuyển các ptu của mảng thành các biến riêng lẻ, giúp dễ sd gtri từng ptu
                                    if ($ma_loai == $hang_hoa_info['ma_loai']) {
                                        $s = "selected";  //đánh dấu mục này là mục đc chọn mặc định trong ds thả xuống
                                    } else {
                                        $s = "";
                                    }
                                    echo '<option ' . $s . ' value="' . $ma_loai . '">' . $ten_loai . '</option>';
                                }

                                ?>

                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="tieu_de" class="form-label">Tiêu đề tin tức</label>
                            <input type="text" name="tieu_de" id="tieu_de" class="form-control" required  
                                value="<?= $tieu_de ?>">                                         <!--required yêu cầu ng dùng bắt buộc nhập -->
                        </div>
                                
                        <div class="form-group col-sm-4">
                            <label for="ma" class="form-label">Mã tin tức</label>
                            <input type="text" name="ma" id="ma" readonly class="form-control"
                                value="<?= $ma ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <div class="row align-items-center">
                                <div class="col-sm-8">
                                    <label for="up_hinh" class="form-label">Ảnh tin tức </label>
                                    <input type="hidden" name="hinh" id="hinh" class="form-control"
                                          value="<?= $hinh ?>">
                                    <input type="file" name="up_hinh" id="up_hinh" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <!-- Ảnh sản phẩm ban đầu -->
                                    <?= $img ?>
                                </div>
                            </div>
                        </div>
                        

    
                    </div>
                    <div class="row">

                    </div>
                        <div class="form-group col-sm-4">
                            <label for="ngay" class="form-label">Ngày nhập</label>
                            <input type="date" name="ngay" id="ngay" class="form-control" required
                                value="<?= $ngay ?>">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="luot_xem" class="form-label">Số lượt xem</label>
                            <input type="text" name="luot_xem" id="luot_xem" readonly class="form-control"
                                required value="<?= $luot_xem ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="noi_dung" class="form-label">Nội dung</label>
                                <textarea id="txtarea" spellcheck="false" name="noi_dung"
                                class="form-control form-control-lg mb-3" id="textareaExample"
                                rows="3"><?= $noi_dung ?></textarea>
                        </div>
                    </div>

                    <div class="mb-3 text-center">
                        <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                        <!-- nút reset để nhập lại nút này sẽ xóa toàn bộ dữ liệu người đã nhập vào biểu mẫu -->
                        <input type="submit" name="btn_update" value="Cập nhật" class="btn btn-primary mr-3">
                        <!-- Khi người dùng bấm vào nút này, biểu mẫu sẽ được gửi đi và dữ liệu trong biểu mẫu sẽ được xử lý bởi máy chủ -->
                        <a href="index.php?btn_list"><input type="button" class="btn btn-success" value="Danh sách"></a>
                         <!-- liên kết dẫn đến trang danh sách -->
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
