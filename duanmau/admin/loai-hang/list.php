<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Danh sách loại hàng</h4>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <form action="?btn_delete_all" method="post" class="table-responsive">
                <!-- Đây là một biểu mẫu sẽ gửi dữ liệu đến URL có tham số btn_delete_all bằng phương thức POST. -->
                <button type="submit" class="btn btn-danger mb-1" id="deleteAll" onclick="return checkDelete()">
                    Xóa mục đã chọn</button>
                    <!-- Dòng mã này tạo một nút "Xóa mục đã chọn" với kiểu dáng màu đỏ và một sự kiện JavaScript (onclick) để kiểm tra trước khi xóa. -->
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>Mã loại</th>
                            <th>Tên loại</th>
                            <th><a href="index.php" class="btn btn-success text-white">Thêm mới
                                    <i class="fas fa-plus-circle"></i></a></th>
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
</div>