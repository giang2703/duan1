<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật danh mục</div>
            <div class="card-body">
                <form action="index.php?btn_update" method="POST" id="edit_loai">
                     <!-- method="POSTxác định phương thức gửi dữ liệu post cho phép gửi dữ liệu ẩn an toàn -->
                    <div class="mb-3">
                        <!-- nhập dữ liệu -->
                        <label for="ma_loai" class="form-label">Mã loại</label>
                        <input type="text" name="ma_loai" class="form-control" disabled value="<?= $ma_loai ?>">
                    </div>
                    <div class="mb-3">
                        <label for="ten_loai" class="form-label">Tên loại</label>
                        <input type="text" name="ten_loai" placeholder="Nhập tên loại" class="form-control" required
                            value="<?= $ten_loai ?>">
                    </div>
                    <div class="mb-3 text-center">
                        <input type="hidden" name="ma_loai" value="<?= $ma_loai ?>">
                        <!--  sử dụng để chứa giá trị của biến $ma_kh, một giá trị quan trọng liên quan đến khách hàng. -->
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