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
        <h2>THỐNG KÊ HÀNG HÓA TỪNG LOẠI</h2>
    </div>

        <div class="box-body">
            <!-- <input type="button" class="btn btn-danger mb-1" value="Xóa các mục đã chọn"> -->
            <table width="100%" class="table table-hover table-bordered text-center">
                <thead class="thead">
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
                        <td><?= number_format($gia_min, 2) ?><sup>đ</sup></td> 
                        <td><?= number_format($gia_max, 2) ?><sup>đ</sup></td>
                        <td><?= number_format($gia_avg, 2) ?><sup>đ</sup></td>
                    </tr>
                    <?php
                    }

                    ?>
                </tbody>
            </table>
            <!-- hiển thị biểu đồ dữ liệu sản phẩm. -->
            <a href="index.php?chart" class="btn btn-success ">Xem biểu đồ<i class="fas fa-eye ml-2"></i></a>
        </div>

    </div>