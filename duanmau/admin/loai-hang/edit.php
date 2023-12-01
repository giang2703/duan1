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
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div>
                <h2>Cập nhật danh mục</h2>
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
</div>