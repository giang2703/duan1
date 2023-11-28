<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Tổng hợp bình luận</h4> <!--mt-5 khoảng cách lề trên của tiêu đề 
        text-center" được sử dụng để căn giữa tiêu đề theo chiều -->
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <table width="100%" class="table table-hover table-bordered text-center"><!--hiển thị thông tin tổng hợp về bình luận.-->
                <thead class="thead-dark"> <!--Phần đầu của bảng,-->
                    <tr>
                        <th>Hàng hóa</th>
                        <th>Số bình luận</th>
                        <th>Cũ nhất</th>
                        <th>Mới nhất</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //để lặp qua mảng $items và trích xuất thông tin từ mỗi mục của mảng để điền vào từng hàng của bảng.
                    foreach ($items as $item) { // vòng lặp mỗi mang $items đc hiển thị ở 1 hàng trong bảng
                        extract($item);

                    ?>
                    <tr>
                        <td><?= $ten_hh ?></td>
                        <td><?= $so_luong ?></td>
                        <td><?= $cu_nhat ?></td>
                        <td><?= $moi_nhat ?></td>
                        <td class="text-end">
                            <a href="../binh-luan/index.php?ma_hh=<?= $ma_hh ?>"
                                class="btn btn-outline-info btn-rounded">Chi tiết <i
                                    class="fas fa-info-circle"></i></i></a>
                        </td>
                    </tr>
                    <?php
                    }
                        //mã này tạo ra một bảng dữ liệu để tổng hợp thông tin về bình luận 
                        //trên các hàng hóa và cung cấp một liên kết để xem chi tiết bình luận cho từng hàng hóa.
                    ?>
                </tbody>

            </table>
        </div>
    </div>
</div>