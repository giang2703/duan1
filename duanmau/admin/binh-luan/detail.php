<div class="container">
    <div class="page-title">

        <h4 class="mt-5 font-weight-bold text-center">Chi tiết bình luận</h4>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <form action="?btn_delete_all" method="post" class="table-responsive"> 
            <!-- method="post" để gửi dữ liệu lên máy chủ -->
                <button type="submit" class="btn btn-danger mb-1" id="deleteAll" onclick="return checkDelete()">
                    Xóa mục đã chọn</button> <i class="ml-5">hàng hóa: <b><?= $items[0]['ten_hh'] ?></b></i> <!-- nó hiển thị giá trị của $items[0]['ten_hh']. 
                    Điều này dựa vào dữ liệu trong mảng $items để hiển thị tên hàng hóa liên quan đến bình luận. -->

                    <!-- onclick="return checkDelete()": Đây là một sự kiện JavaScript. 
                    Khi người dùng nhấn nút này, sự kiện này sẽ gọi hàm checkDelete(). Nếu hàm checkDelete() trả về true, 
                    thì biểu mẫu sẽ được gửi đến máy chủ. Nếu hàm trả về false, thì biểu mẫu sẽ không được gửi.-->
                    <!-- chung lại thì dòng lệnh trên dùng để xóa bình trong hàng-->

                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>Đánh giá</th>
                            <th>Nội dung</th>
                            <th>Ngày BL</th>
                            <th>Người BL</th>
                            <th></th>
                        </tr>
                    </thead>
                    <!-- tạo bảng dữ liệu như trên-->
                    <tbody>
                        <?php
                          // vòng lặp là để chuẩn bị dữ liệu từ mảng $items để hiển thị thông tin về bình luận
                        foreach ($items as $item) {
                            //foreach ($items as $item) Đây là bắt đầu của vòng lặp foreach. 
                            //Nó lặp qua mảng $items, và trong mỗi vòng lặp, một phần tử từ mảng sẽ được gán cho biến $item.
                            extract($item);
                            //trích xuất các phần tử của mảng $item thành các biến riêng lẻ

                        ?>
                        <tr>
                            <td><input type="checkbox" name="ma_bl[]" value="<?= $ma_bl ?>"></td>
                            <!--Đây là ô trong hàng dùng để chứa một ô kiểm (checkbox).
                            Ô kiểm này cho phép người dùng chọn mục bình luận cụ thể để xóa hoặc thực hiện một hành động nào đó. Thuộc tính
                            
                            Name="ma_bl[]" nó gửi bình luận của khách về máy chủ -->
                            <td><?= $rating ?> sao</td>
                            <td><?= $noi_dung ?></td>
                            <td><?= $ngay_bl ?></td>
                            <td><?= $ma_kh ?></td>
                            <td class="text-end">
                                <a href="index.php?btn_delete&ma_bl=<?= $ma_bl ?>&ma_hh=<?= $ma_hh ?>"
                                    class="btn btn-outline-danger btn-rounded" onclick="return checkDelete()"><i
                                        class="fas fa-trash"></i></a>
                            </td>
                        <!-- Trong ô này, có một nút hoặc liên kết (anchor) được tạo ra để xóa bình luận -->
                        
                        </tr>
                        <?php
                        }

                        ?>
                    </tbody>

                </table>
                <input type="hidden" name="ma_hh" value="<?= $ma_hh ?>">
                <!-- Nó chứa giá trị $ma_hh và được gửi khi biểu mẫu được gửi lên máy chủ. 
                Thường, trường ẩn được sử dụng để truyền dữ liệu từ một trang hoặc biểu mẫu này sang trang hoặc biểu mẫu khác để xử lý. -->
                <div class="mt-3" width="100%">
                    <ul class="pagination justify-content-center">
                        <!-- ây là danh sách (unordered list) được sử dụng để hiển thị các liên kết phân trang. -->
                        <?php for ($i = 1; $i <= $_SESSION['total_page']; $i++) { ?>
                        <!-- tạo các liên kết phân trang dựa trên số trang tổng cộng 
                        ($_SESSION['total_page']). Vòng lặp for được sử dụng để tạo liên kết cho mỗi trang.
                        -->
                        <li class="page-item <?= $_SESSION['page'] == $i ? 'active' : '' ?>">
                        <!-- Đây là một phần tử danh sách để chứa liên kết phân trang
                        điều kiện kiểm tra xác định xem trang hiện tại ($_SESSION['page']) có bằng $i không. 
                        Nếu bằng nhau, lớp "active" sẽ được thêm vào để làm nổi bật trang hiện tại. -->
                            <a class="page-link" href="?ma_hh=<?= $ma_hh ?>&page=<?= $i ?>"><?= $i ?></a>
                        </li>
                            <!--<-?= $i ?>: Mã PHP này hiển thị số trang, dựa trên giá trị của biến $i. -->
                        <?php } ?>

                    </ul>
                </div>
                <a class="btn btn-dark" href="index.php">Quay lại</a>
            </form>
        </div>
    </div>
</div>