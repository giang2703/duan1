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


<div class="container mt-2">
    <div class="page-title">
        <h2>Danh sách tin tức </h2>
        <?php
        if (isset($MESSAGE) && (strlen($MESSAGE) > 0)) { // kiểm tra biến $MESSAGE đã tồn tại ch và độ dài số ký tự >0
            echo '<h5 class="alert alert-warning">' . $MESSAGE . '</h5>';
        }
        ?>
    </div>

        <div class="box-body">
            <form action="?btn_delete_all" method="post" class="table-responsive">
                <button type="submit" class="btn btn-danger mb-1" id="deleteAll" onclick="return checkDelete()">
                    Xóa mục đã chọn</button>
                <a href="index.php" class="btn btn-success mb-1">Thêm mới <i class="fas fa-plus-circle"></i></a>
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead">
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>Mã TT</th>
                            <th>Tiêu đề</th>
                            <th>Ảnh</th>
                            <th>Lượt xem</th>
                            <th>Ngày nhập</th>
                            
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($items as $item) {  // vòng lặp mỗi mang $items đc hiển thị ở 1 hàng trong bảng
                            extract($item); // truy xuất các giá trị từ mảng
                            $suatt = "index.php?btn_edit&ma=" . $ma; // tạo liên kết đén trang sửa dựa trên ma_hh
                            $xoatt = "index.php?btn_delete&ma=" . $ma;
                            $img_path = $UPLOAD_URL . '/products/' . $hinh; // xác định đường dẫn tới tệp 
                            if (is_file($img_path)) {
                                $img = "<img src='$img_path' height='60' width='60' class='object-fit-contain'>";
                                // nếu tệp tồn tại nó sẽ hiển thị hình ảnh 
                            } else {
                                $img = "no photo"; // nếu không có hình ảnh nó sẽ hiện no photo
                            }
                        ?>
                        <tr>
                            <td><input type="checkbox" name="ma[]" value="<?= $ma ?>"></td>
                            <!-- tạo một ô check box sử dụng chọn các mục hàng hóa cùng lúc để thực hiện các tác vụ -->
                            <td><?= $ma ?></td>
                            <td><?= $tieu_de ?></td>
                            <td><?= $img ?></td>
                            <td><?= $luot_xem ?></td>
                            <td><?= $ngay ?></td>
                            <td class="text-end">
                                <a href="<?= $suatt ?>" class="btn btn-outline-info btn-rounded"><i
                                        class="fas fa-pen"></i></a>
                                <a href="<?= $xoatt ?>" class="btn btn-outline-danger btn-rounded"
                                    onclick="return checkDelete()"><i class="fas fa-trash"></i></a> 
                                    <!-- checkDelete kiểm tra hoặc xử lý xóa mục -->
                            </td>
                        </tr>
                        <?php
                        }

                        ?>
                    </tbody>

                </table>

                <div class="mt-3" width="100%">
                    <ul class="pagination justify-content-center">
                        <!-- bắt đầu một vòng lặp for để tạo danh sách trang cho việc điều hướng -->
                        <?php for ($i = 1; $i <= $_SESSION['total_page']; $i++) { ?>
                            <!-- <= toán tử so sánh -->
                        <!-- vòng lặp này lặp qua giá tr biến $i từ 1 đến $_SESSION['total_page'  -->
                        <li class="page-item <?= $_SESSION['page'] == $i ? 'active' : '' ?>">
                        <!-- danh sách đcc dùng để hiển thị một trang hoặc nút điều hướng -->
                            <a class="page-link" href="?btn_list&page=<?= $i ?>"><?= $i ?></a>
                            <!-- liên kết sử dụng chuyển đến trang khác của web -->
                        </li>
                            <!--  tạo danh sách hoặc nút điều hướng với trabg hiện tại cho phép người dùng chuyển trang khác =c nhấn vào liên kết tuogw ứng  -->
                        <?php } ?>

                    </ul>
                </div>
            </form>

        </div>
</div>