<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">Thêm danh mục</div>
            <div class="card-body">
                <form action="index.php" method="POST" id="add_loai">
                    <!-- thông qua biểu mẫu người dùng có thể nhập dữ liệu và sau đó gửi đến tệp index.php để sử lý  -->
                   
                   <!-- trường nhập liệu -->
                    <div class="mb-3">
                        <label for="ma_loai" class="form-label">Mã loại</label>
                        <input type="text" name="ma_loai" class="form-control" disabled>
                        <!-- disabled thông tin cố định k thể sửa-->
                    </div>
                    <div class="mb-3">
                        <label for="ten_loai" class="form-label">Tên loại</label>
                        <input type="text" name="ten_loai" class="form-control" required>
                        <!-- required bắt buộc nhập trước khi gửi biểu mẫu -->
                    </div>
                    
                    <div class="mb-3 text-center">
                        <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                        <!-- nút reset để nhập lại nút này sẽ xóa toàn bộ dữ liệu người đã nhập vào biểu mẫu -->
                        <input type="submit" name="btn_insert" value="Thêm mới" class="btn btn-primary mr-3">
                        <!-- nút submit để thêm dữ liệu ddax nhập ở biểu mẫu lên máy chủ và sẻ lý dữ liệu -->
                        <a href="index.php?btn_list"><input type="button" class="btn btn-success" value="Danh sách"></a>
                        <!-- liên kết đến trang danh sách loại hàng -->
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>