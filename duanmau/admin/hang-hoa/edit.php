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
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật hàng hóa</div>
            <div class="card-body">
                <form action="index.php?btn_update" method="POST" enctype="multipart/form-data" id="update_hang_hoa">
                    <!-- xác định URL "index.php?btn_update" cho action của biểu mẫu được gửi đến khi nó được submit và cấu hình biểu mẫu để gửi dữ liệu 
                    dưới dạng POST với kiểu dữ liệu "multipart/form-data". -->
                    <!-- method="POSTxác định phương thức gửi dữ liệu post cho phép gửi dữ liệu ẩn an toàn -->
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="ma_loai" class="form-label">Loại hàng</label>
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
                            <label for="ten_hh" class="form-label">Tên hàng hóa</label>
                            <input type="text" name="ten_hh" id="ten_hh" class="form-control" required  
                                value="<?= $ten_hh ?>">                                         <!--required yêu cầu ng dùng bắt buộc nhập -->
                        </div>
                                
                        <div class="form-group col-sm-4">
                            <label for="ma_hh" class="form-label">Mã hàng hóa</label>
                            <input type="text" name="ma_hh" id="ma_hh" readonly class="form-control"
                                value="<?= $ma_hh ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <div class="row align-items-center">
                                <div class="col-sm-8">
                                    <label for="up_hinh" class="form-label">Ảnh sản phẩm</label>
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
                        <div class="form-group col-sm-4">
                            <label for="don_gia" class="form-label">Đơn giá (vnđ)</label>
                            <input type="text" name="don_gia" id="don_gia" class="form-control" value="<?= $don_gia ?>">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="giam_gia" class="form-label">Giảm giá (vnđ)</label>
                            <input type="text" name="giam_gia" id="giam_gia" class="form-control" required
                                value="<?= $giam_gia ?>">
                        </div>
                    </div>
                    <div class="row">


                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label>Hàng đặc biệt?</label>
                            <div class="form-control">
                                <label class="radio-inline  mr-3">
                                    <input type="radio" value="1" name="dac_biet" <?= $dac_biet ? 'checked' : '' ?>>Đặc
                                    biệt
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="0" name="dac_biet"
                                        <?= !$dac_biet ? 'checked' : '' ?>>Bình thường
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="ngay_nhap" class="form-label">Ngày nhập</label>
                            <input type="date" name="ngay_nhap" id="ngay_nhap" class="form-control" required
                                value="<?= $ngay_nhap ?>">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="so_luot_xem" class="form-label">Số lượt xem</label>
                            <input type="text" name="so_luot_xem" id="so_luot_xem" readonly class="form-control"
                                required value="<?= $so_luot_xem ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="mo_ta" class="form-label">Mô tả sản phẩm</label>
                                <textarea id="txtarea" spellcheck="false" name="mo_ta"
                                class="form-control form-control-lg mb-3" id="textareaExample"
                                rows="3"><?= $mo_ta ?></textarea>
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
