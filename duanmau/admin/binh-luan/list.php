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
        <h2>Tổng hợp bình luận</h2> <!--mt-5 khoảng cách lề trên của tiêu đề 
        text-center" được sử dụng để căn giữa tiêu đề theo chiều -->
    </div>

        <div class="box-body">
            <table width="100%" class="table table-hover table-bordered text-center"><!--hiển thị thông tin tổng hợp về bình luận.-->
                <thead class="thead"> <!--Phần đầu của bảng,-->
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