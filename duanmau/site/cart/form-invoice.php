<div class="container">
    <div class="row m-1 pb-5">
        
        <form action="<?= $SITE_URL . '/cart/invoice.php' ?>" method="POST" class="col-6 m-auto p-4 border rounded" id="invoice"
            enctype="multipart/form-data">
            <h4 class="card-title mb-4 ">Thông tin tài khoản</h4>

            <!-- Hộp nhập thông tin Họ và Tên -->
            <div class="form-group form">
                <label for="">Họ và tên</label>
                <input type="text" name="ho_ten" id="" class="form-control rounded-pill" value="<?= $ho_ten ?>"
                    aria-describedby="helpId">
            </div>
            <!-- Hộp nhập Mã Khách Hàng (ẩn) -->
            <div class="form-group">
                <!-- <label for="">Tên đăng nhập</label> -->
                <input type="hidden" name="ma_kh" id="" class="form-control rounded-pill" value="<?= $ma_kh ?>"
                    aria-describedby="helpId">
            </div>
            <!-- Hộp nhập Địa chỉ Email -->
            <div class="form-group">
                <label for="">Địa chỉ email</label>
                <input type="text" name="email" id="" class="form-control rounded-pill" value="<?= $email ?>"
                    aria-describedby="helpId">
            </div>
            <!-- Hộp nhập Số điện thoại -->
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="text" name="sdt" id="" class="form-control rounded-pill" placeholder=""
                    aria-describedby="helpId">
            </div>
            <!-- Hộp nhập Địa chỉ nhận hàng -->
            <div class="form-group">
                <label for="">Địa chỉ nhận hàng</label>
                <input type="text" name="dia_chi" id="" class="form-control rounded-pill" placeholder=""
                    aria-describedby="helpId">
            </div>
            <!-- Hộp chọn Phương thức thanh toán -->
            <div class="form-group">
                <label for="">Phương thức thanh toán </label>
                <br>
                <input type="radio" name="phuong_thuc_tt" id="" value="0" checked placeholder="" aria-describedby="helpId">
                Tiền mặt
                <input type="radio" name="phuong_thuc_tt" id="" value="1" placeholder="" aria-describedby="helpId"> Chuyển
                khoản ngân hàng
                <input type="radio" name="phuong_thuc_tt" id="" value="2" placeholder="" aria-describedby="helpId"> Ví điện
                tử
            </div>
            <!-- Trường ẩn trạng thái đơn hàng -->
            <input type="hidden" name="trang_thai" value="0">
            <!-- Hộp nhập Ghi chú -->
            <div class="form-group">
                <label for="">Ghi chú</label>
                <textarea name="ghi_chu" class="form-control" id=""></textarea>
            </div>
            <!-- Nút Xác nhận thanh toán -->
            <div class="d-flex justify-content-center">
                <button type="submit" name="btn_thanh_toan" class="btn btn-success btn-block pt-2 pb-2 rounded-pill">Xác
                    nhận</button>
            </div>
        </form>

    </div>
</div>