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
    <h2 class="mb-4">Danh sách loại hàng</h2>
        <div class="box-body">
            <form action="?btn_delete_all" method="post" class="table-responsive">
                <!-- Đây là một biểu mẫu sẽ gửi dữ liệu đến URL có tham số btn_delete_all bằng phương thức POST. -->
                <button type="submit" class="btn btn-danger mb-2" id="deleteAll" onclick="return checkDelete()">
                    Xóa mục đã chọn</button>
                    <!-- Dòng mã này tạo một nút "Xóa mục đã chọn" với kiểu dáng màu đỏ và một sự kiện JavaScript (onclick) để kiểm tra trước khi xóa. -->
                <a href="index.php" class="btn btn-success mb-1">Thêm mới   <i class="fas fa-plus-circle"></i></a>
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead">
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>Mã loại</th>
                            <th>Tên loại</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($items as $item) { // thực hiện vòng lặp duyệt phần tử trong mảng '$items'
                            extract($item); // trích xuất các giá trị cuar mảng  mỗi phần tử
                            $suadm = "index.php?btn_edit&ma_loai=" . $ma_loai; // thực hiện các tác vụ chỉnh sửa và xóa loại hàng cụ thể  
                            $xoadm = "index.php?btn_delete&ma_loai=" . $ma_loai;

                        ?>
                        <tr>
                            <td><input type="checkbox" name="ma_loai[]" value="<?= $ma_loai ?>"></td>
                            <!-- Dòng mã này tạo một ô kiểm (checkbox) trong bảng để chọn một loại hàng hóa. -->
                            <td><?= $ma_loai ?></td>
                            <td><?= $ten_loai ?></td>
                            <td class="text-end">
                                <a href="<?= $suadm ?>" class="btn btn-outline-info btn-rounded"><i
                                        class="fas fa-pen"></i></a> 
                                        <!-- đưa người dùng đến trang chỉnh sưa -->
                                <a href="<?= $xoadm ?>" class="btn btn-outline-danger btn-rounded"
                                    onclick="return checkDelete()"><i class="fas fa-trash"></i></a>
                                    <!-- kiểm tra trc khi xóa -->
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