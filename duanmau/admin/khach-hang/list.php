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

        .thead{
            background-color: #d8c3e5;
            color: #262626;
        }

    </style>


<div class="container mt-5">
    <div class="page-title">
        <h2>Danh sách khách hàng</h2>
    </div>

        <div class="box-body">
            <form action="?btn_delete_all" method="post" class="table-responsive">
                <button type="submit" class="btn btn-danger mb-1" id="deleteAll" onclick="return checkDelete()"> 
                <!-- iểm tra xem người dùng có muốn tiếp tục thực hiện hành động xóa hay không. -->
                    Xóa mục đã chọn</button>
                    <a href="index.php" class="btn btn-success mb-1">Thêm mới   <i class="fas fa-plus-circle"></i></a>
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead">
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>Mã KH</th>
                            <th>Họ và tên</th>
                            <th>Địa chỉ email</th>
                            <th>Ảnh</th>
                            <th>Vai trò</th>
                            <th>Kích hoạt</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($items as $item) {
                            extract($item);
                            //trích xuất các thành phần trong mảng $item
                            $suakh = "index.php?btn_edit&ma_kh=" . $ma_kh; //tạo một biến $suakh dùng để tạo URL dẫn đến trang sửa thông tin của khách hàng có mã là $ma_kh 
                            //để sửa thôngtin
                            $xoakh = "index.php?btn_delete&ma_kh=" . $ma_kh;
                            $img_path = $UPLOAD_URL . '/users/' . $hinh; // tạo đường dẫn hình ảnh 
                            if (is_file($img_path)) { // kiểm tra xem đường dẫn hình ảnh có tồn tại hay không
                                $img = "<img src='$img_path' height='50' width='50' class='rounded-circle object-fit-cover'>";
                            } else {
                                $img = "no photo";
                            }
                            //vòng lặp foreach này cho phép bạn duyệt qua danh sách khách hàng và hiển thị thông tin về họ, 
                            //bao gồm tên, hình ảnh, và các liên kết để sửa hoặc xóa khách hàng.
                        ?>
                        <tr>
                            <td><input type="checkbox" name="ma_kh[]" value="<?= $ma_kh ?>"></td> 
                            <!-- Điều này cho phép người dùng chọn nhiều khách hàng để thực hiện các hành động như xóa hoặc sửa. -->
                            <td><?= $ma_kh ?></td>
                            <td><?= $ho_ten ?></td>
                            <td><?= $email ?></td>
                            <td><?= $img ?></td>
                            <td><?= ($vai_tro == 1) ? "Nhân viên" : "Khách hàng"; ?></td> 
                            <!--hiển thị vai trò   -->
                            <td><?= ($kich_hoat == 1) ? "Rồi" : "Chưa"; ?></td>
                            <!-- hiển thị đc kích hoạt hay ch -->
                            <td class="text-end">
                                <!-- Ô cuối cùng trong hàng chứa các liên kết để sửa và xóa khách hàng -->
                                <a href="<?= $suakh ?>" class="btn btn-outline-info btn-rounded"><i
                                        class="fas fa-pen"></i></a>
                                <a href="<?= $xoakh ?>" class="btn btn-outline-danger btn-rounded"
                                    onclick="return checkDelete()"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                        }

                        ?>
                    </tbody>

                </table>
            </form>
        </div>

</div>