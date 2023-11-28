<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">THỐNG KÊ HÀNG HÓA TỪNG LOẠI</h4>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <input type="button" class="btn btn-danger mb-1" value="Xóa các mục đã chọn">
            <table width="100%" class="table table-hover table-bordered text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>LOẠI HÀNG</th>
                        <th>SỐ LƯỢNG</th>
                        <th>GIÁ CAO NHẤT</th>
                        <th>GIÁ THẤP NHẤT</th>
                        <th>GIÁ TRUNG BÌNH</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($items as $item) { // lặp qua mảng $items và gán giá trị tương ứng 
                        extract($item);// trích xuất giá trị của phần tử mảng 

                    ?>
                    <tr>
                        <td><?= $ten_loai ?></td>
                        <td><?= $so_luong ?></td>
                        <!-- giá trị  tối thiểu tối đa và trung bình-->
                        <!-- trường hợp 2 là hiển thị 2 chử số thập phân -->
                        <td>$<?= number_format($gia_min, 2) ?></td> 
                        <td>$<?= number_format($gia_max, 2) ?></td>
                        <td>$<?= number_format($gia_avg, 2) ?></td>
                    </tr>
                    <?php
                    }

                    ?>
                </tbody>
            </table>
            <!-- hiển thị biểu đồ dữ liệu sản phẩm. -->
            <a href="index.php?chart" class="btn btn-info text-white">Xem biểu đồ<i class="fas fa-eye ml-2"></i></a>
        </div>
    </div>
</div>