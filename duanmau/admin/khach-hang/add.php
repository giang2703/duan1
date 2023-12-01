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

        <h2>Thêm mới khách hàng</h2>
                <div class="card-body">
                    <form action="index.php" method="POST" enctype="multipart/form-data" id="admin_add_kh">
                        <!-- action="index.php" xác định url mà biểu sẽ gửi dữ liệu -->
                        <!-- method="POSTxác định phương thức gửi dữ liệu post cho phép gửi dữ liệu ẩn an toàn -->
                        <!-- enctype="multipart/form-data" id="admin_add_kh" sử dụng khi tải tệp  -->
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="ma_kh" class="form-label">Mã khách hàng (tên đăng nhập)</label>
                                <input type="text" name="ma_kh" id="ma_kh" class="form-control" required>
                                <!-- required bắt buộc nhập trước khi gửi biểu mẫu -->
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="ho_ten" class="form-label">Họ và tên</label>
                                <input type="text" name="ho_ten" id="ho_ten" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="mat_khau" class="form-label">Mật khẩu</label>
                                <input type="password" name="mat_khau" id="mat_khau" class="form-control" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="mat_khau" class="form-label">Xác nhận mật khẩu</label>
                                <input type="password" name="mat_khau2" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="hinh" class="form-label">Ảnh</label>
                                <input type="file" name="hinh" id="hinh" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="email" class="form-label">Địa chỉ email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Kích hoạt?</label>
                                <div class="form-control">
                                    <label class="radio-inline  mr-3">
                                        <input type="radio" value="0" name="kich_hoat"> Chưa kích
                                        hoạt
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="1" name="kich_hoat" checked> Kích hoạt
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Kích hoạt?</label>
                                <div class="form-control">
                                    <label class="radio-inline ">
                                        <input type="radio" value="0" name="vai_tro"> Khách hàng
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="1" name="vai_tro" checked> Nhân viên
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 text-center mt-3">
                            <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                            <!-- nút reset để nhập lại nút này sẽ xóa toàn bộ dữ liệu người đã nhập vào biểu mẫu -->
                            <input type="submit" name="btn_insert" value="Thêm mới" class="btn btn-primary mr-3">
                            <!-- nút submit để thêm dữ liệu ddax nhập ở biểu mẫu lên máy chủ và sẻ lý dữ liệu -->
                            <a href="index.php?btn_list"><input type="button" class="btn btn-success" value="Danh sách"></a>
                            <!-- liên kết đến trang danh sách khách hàng  -->
                        </div>

                    </form>
                </div>
            </div>
        </div>
</div>