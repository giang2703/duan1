<?php
$totalAll = 0; // Khởi tạo biến $totalAll để tính tổng giá trị của giỏ hàng

?>
<!-- Hiển thị tiêu đề "Giỏ hàng" -->
<h5 class="alert-info mb-3 pt-3 pb-3 pl-sm-4 shadow-sm text-center" style="margin-top: 5rem; margin-bottom: 0rem">Giỏ
    hàng</h5>

<div class="container">

    <?php
    // Bước 1: Kiểm tra nếu tồn tại giỏ hàng trong session ($_SESSION['cart'])
    if (isset($_SESSION['cart'])) {
    ?>
     <!-- Bước 2: Hiển thị danh sách sản phẩm trong giỏ hàng -->
    <div class="row m-1 pb-5">
        <table class="table table-responsive-md">
            <thead class="thead text-center">
                <tr>
                    <th>Mã SP</th>
                    <th>Tên SP</th>
                    <th>Đơn giá</th>
                    <th>Giảm giá</th>
                    <th style="width:6rem">Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody class="text-center" id="giohang">
                <!-- Bước 3: Lặp qua từng sản phẩm trong giỏ hàng và hiển thị -->
                <?php foreach ($_SESSION['cart'] as $index => $item) : ?>
                <tr>
                    <td><?= $index ?></td>
                    <!-- Hiển thị tên sản phẩm -->
                    <td><?= $item['ten_hh'] ?></td>
                    <!-- Hiển thị đơn giá sản phẩm -->
                    <td><span><?= number_format($item['don_gia'], 0, ".") ?></span> đ <input type="hidden"
                            class="don_gia_an" name="don_gia" value="<?= $item['don_gia'] ?>"></td>
                    <!-- Hiển thị giảm giá sản phẩm -->        
                    <td><span><?= number_format($item['giam_gia'], 0, ".") ?></span> đ <input type="hidden"
                            class="giam_gia_an" name="giam_gia" value="<?= $item['giam_gia'] ?>"></td>
                    <!-- Số lượng sản phẩm có thể chỉnh sửa -->        
                    <td class="pt-1 m-auto">
                        <form action="delete_cart.php?act=update_sl" method="post">
                            <input type="number" class="form-control sl" name="update_sl" onchange="this.form.submit()"
                                value="<?= $item['sl'] ?>" min="1" max="10">
                            <input type="hidden" class="form-control" name="ma_hh" value="<?= $index ?>">
                        </form>
                    </td>
                     <!-- Thành tiền của sản phẩm -->
                    <td> <span class="thanh_tien_sp"></span> đ</td>

                    <!-- Nút xóa sản phẩm khỏi giỏ hàng -->
                    <td class="pt-1 m-auto">
                        <a onclick="return confirm('Bạn chắc chắn muốn xóa k??');"
                            href="<?= $SITE_URL . "/cart/delete-cart.php?act=delete&id=" . $index ?>"
                            class="btn btn-outline-danger"> <i class="fas fa-trash-alt "></i></a>
                    </td>
                </tr>
                <!-- phân trang -->
                <?php endforeach ?> 
                <!-- Phần tổng hợp thông tin giỏ hàng -->
            </tbody>

            <?php
            $totalAll = 0; // Khởi tạo biến $totalAll để tính tổng giá trị của giỏ hàng

            // Tính tổng tiền giỏ hàng
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $index => $item) {
                    // Tính tổng tiền cho từng sản phẩm và cộng vào tổng tổng $totalAll
                    $totalAll += $item['sl'] * $item['don_gia'];
                }
            }

            ?>

            <tfoot id="tongdonhang">
                <tr class="text-center">
                    <th colspan="5">Tổng thành tiền: </th>
                    <td class="  text-danger font-weight-bold"><span id="tong_thanh_tien"><?= number_format($totalAll, 0, ".") ?></span> đ</td>
                    <td></td>
                </tr>
                <tr class="text-right">
                    <th colspan="7">
                         <!-- Nút thanh toán và nút xóa tất cả sản phẩm khỏi giỏ hàng -->
                        <a href="<?= $SITE_URL . "/cart/list-cart.php?form_invoice" ?>" class="btn btn-success">Thanh
                            toán</a>
                        <a onclick="return confirm('Bạn chắc chắn muốn xóa tất cả k??');"
                            href="<?= $SITE_URL . "/cart/delete-cart.php?act=deleteAll" ?>" class="btn btn-danger">Xóa
                            tất
                            cả</a>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
    <?php } else { ?>
        <!-- Hiển thị thông báo khi giỏ hàng trống -->
    <div class="row  m-1 pb-5">
        <h6 class="col-12">Không tồn tại sản phẩm nào trong giỏ hàng </h6>
        <a class="btn btn-outline-dark col-12" href="<?= $ROOT_URL ?>"> Về trang chủ</a>
    </div>
    <?php } ?>
</div>