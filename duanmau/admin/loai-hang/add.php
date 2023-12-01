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
                <h2 >Thêm danh mục</h2>
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
</div>