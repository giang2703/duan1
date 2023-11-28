<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">Thêm mới hàng hóa</div>
            <div class="card-body">
                <form action="index.php" method="POST" enctype="multipart/form-data" id="add_hang_hoa">
                    <!--  action="index.php"xác định URL mà biểu mẫu sẽ được gửi đến khi người dùng nhấn nút gửi (Submit).-->
                    <!-- method="POSTxác định phương thức gửi dữ liệu post cho phép gửi dữ liệu ẩn an toàn -->
                    <!-- enctype="multipart/form-data": Thuộc tính enctype xác định loại mã hóa dữ liệu khi gửi biểu mẫu -->
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="ma_loai" class="form-label">Loại hàng</label>
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
                            <label for="ten_hh" class="form-label">Tên hàng hóa</label>
                            <input type="text" name="ten_hh" id="ten_hh" class="form-control"> 
                            <!-- trường nhập liệu  -->
                        </div>
                        <!--Trường nhập liệu này sẽ hiển thị giá trị mã hàng hóa là "auto number" 
                        và người dùng không thể thay đổi giá trị của nó, nó có thể được sử dụng để 
                        hiển thị thông tin không thay đổi hoặc tự động tạo ra.  -->
                        <div class="form-group col-sm-4">
                            <label for="ma_hh" class="form-label">Mã hàng hóa</label>
                            <input type="text" name="ma_hh" id="ma_hh" readonly class="form-control"
                                value="auto number">
                        </div>
                    </div>
                    <!-- cho phép người dùng tải hình ảnh sản phẩm lên web -->
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="hinh" class="form-label">Ảnh sản phẩm</label>
                            <input type="file" name="hinh" id="hinh" class="form-control">
                        </div>
                        <!--Nhập đơn giá cho sản phẩm  -->
                        <div class="form-group col-sm-4">
                            <label for="don_gia" class="form-label">Đơn giá (vnđ)</label>
                            <input type="number" name="don_gia" id="don_gia" class="form-control">
                        </div>
                        <!--mức giảm giá của sản phẩm  -->
                        <div class="form-group col-sm-4">
                            <label for="giam_gia" class="form-label">Giảm giá (vnđ)</label>
                            <input type="number" name="giam_gia" id="giam_gia" class="form-control">
                        </div>
                    </div>
                    <div class="row">

                    </div>
                    <!-- cho phép người chọn giá trị đặc biệt hay hay bình thường
                    khi người dùng chọn một trong hai tùy chọn, giá trị tương ứng sẽ được gửi lên máy chủ khi biểu mẫu được gửi để xử lý. -->
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label>Hàng đặc biệt?</label>
                            <div class="form-control">
                                <label class="radio-inline  mr-3">
                                    <input type="radio" value="1" name="dac_biet">Đặc biệt
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="0" name="dac_biet" checked>Bình thường
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <!-- lấy ngày hiện tại và định dạng nó thành chuỗi theo định dạng 'Y-m-d' (năm-tháng-ngày). 
                            Kết quả được lưu trong biến $today để sử dụng làm giá trị mặc định cho trường nhập liệu ngày. -->
                            <?php $today = date_format(date_create(), 'Y-m-d'); ?>
                            <label for="ngay_nhap" class="form-label">Ngày nhập</label>
                            <input type="date" name="ngay_nhap" id="ngay_nhap" class="form-control"
                                value="<?= $today ?>">
                                <!-- tức là ngày hiện tại được hiển thị là giá trị mặc định khi trang web được tải. 
                                Người dùng có thể thay đổi ngày này nếu cần. -->
                        </div>
                        <!-- hiển thị lượt xem  -->
                        <div class="form-group col-sm-4">
                            <label for="so_luot_xem" class="form-label">Số lượt xem</label>
                            <input type="text" name="so_luot_xem" id="so_luot_xem" readonly class="form-control"
                                value="0">
                        </div>
                    </div>
                    <!-- mô tả sản phẩm  -->
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="mo_ta" class="form-label">Mô tả sản phẩm</label>
                            <textarea id="txtarea" spellcheck="false" name="mo_ta"
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