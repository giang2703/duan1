<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Danh sách hàng hóa</h4>
        <?php
        if (isset($MESSAGE) && (strlen($MESSAGE) > 0)) { // kiểm tra biến $MESSAGE đã tồn tại ch và độ dài số ký tự >0
            echo '<h5 class="alert alert-warning">' . $MESSAGE . '</h5>';
        }
        ?>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <form action="?btn_delete_all" method="post" class="table-responsive">
                <button type="submit" class="btn btn-danger mb-1" id="deleteAll" onclick="return checkDelete()">
                    Xóa mục đã chọn</button>
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>Mã HH</th>
                            <th>Tên hàng hóa</th>
                            <th>Ảnh</th>
                            <th>Đơn giá</th>
                            <th>Giảm giá</th>
                            <th>Lượt xem</th>
                            <th>Ngày nhập</th>
                            <th>Đặc biệt?</th>
                            <th><a href="index.php" class="btn btn-success text-white">Thêm mới
                                    <i class="fas fa-plus-circle"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($items as $item) {  // vòng lặp mỗi mang $items đc hiển thị ở 1 hàng trong bảng
                            extract($item); // truy xuất các giá trị từ mảng
                            $suahh = "index.php?btn_edit&ma_hh=" . $ma_hh; // tạo liên kết đén trang sửa dựa trên ma_hh
                            $xoahh = "index.php?btn_delete&ma_hh=" . $ma_hh;
                            $img_path = $UPLOAD_URL . '/products/' . $hinh; // xác định đường dẫn tới tệp 
                            if (is_file($img_path)) {
                                $img = "<img src='$img_path' height='60' width='60' class='object-fit-contain'>";
                                // nếu tệp tồn tại nó sẽ hiển thị hình ảnh 
                            } else {
                                $img = "no photo"; // nếu không có hình ảnh nó sẽ hiện no photo
                            }
                            //Tính giảm bn %
                            if ($don_gia > 0) {
                                $percent_discount = number_format($giam_gia / $don_gia * 100);
                            }
                            // lặp qua danh sách sản phẩm và hiển thị thông tin 
                        ?>
                        <tr>
                            <td><input type="checkbox" name="ma_hh[]" value="<?= $ma_hh ?>"></td>
                            <!-- tạo một ô check box sử dụng chọn các mục hàng hóa cùng lúc để thực hiện các tác vụ -->
                            <td><?= $ma_hh ?></td>
                            <td><?= $ten_hh ?></td>
                            <td><?= $img ?></td>
                            <td><?= number_format($don_gia, 0) ?>đ</td> 
                            <td><?= number_format($giam_gia, 0) ?>đ<i
                                    class="text-danger">(<?= isset($percent_discount) ? $percent_discount : '' ?>%)</i>
                                    <!-- hiển thị % giảm giá 
                                        isset($percent_discount) ? $percent_discount  kiểm tra $percent_discount đã tồn tại hay ch 
                                        nếu tộn tại thì hiển thị giá trị $percent_discount
                                        không tồn tại chuổi rỗng 
                                    -->
                            </td>
                            <td><?= $so_luot_xem ?></td>
                            <td><?= $ngay_nhap ?></td>
                            <td><?= ($dac_biet == 1) ? "Đặc biệt" : "Không"; ?></td>

                            <td class="text-end">
                                <a href="<?= $suahh ?>" class="btn btn-outline-info btn-rounded"><i
                                        class="fas fa-pen"></i></a>
                                <a href="<?= $xoahh ?>" class="btn btn-outline-danger btn-rounded"
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
</div>