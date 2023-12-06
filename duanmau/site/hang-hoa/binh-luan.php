<style>
    .reset{
        background-color: #c097c6;
        color: #fff;
    }

    .reset:hover{
        background-color: #b686bd;
        color: #fff;

    }
</style>

<div class="col-12" id="reviews">
    <div class="card border-light mb-3">
         <!-- Phần tiêu đề "Đánh giá" -->
        <div class=" text-uppercase" style="padding: 10px;color: #b686bd ;">
            <i class="fa fa-comment"></i> Đánh giá
        </div>

        <div class="card-body">
            <!-- Vòng lặp để hiển thị danh sách bình luận -->
            <?php foreach ($binh_luan_list as $bl) : ?>
            <div class="review">
                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                <meta itemprop="datePublished" content="01-01-2016"><?= $bl['ngay_bl'] ?>

                <?php for ($i = 1; $i <= $bl['rating']; $i++) {
                        echo '<span class="review_rating fa fa-star"></span>';
                    } ?>
                <!-- Hiển thị tên người đánh giá -->
                by <b><?= $bl['ho_ten'] ?></b>
                <!-- Hiển thị hình ảnh người đánh giá -->
                <img width="40" height="40" class="rounded-circle object-fit-cover"
                    src="<?= $UPLOAD_URL . "/users/" . $bl['hinh'] ?>" />
                 <!-- Hiển thị nội dung bình luận -->
                    <p class="blockquote">
                <p class="mb-0"><?= $bl['noi_dung'] ?></p>
                </p>
                <hr>
            </div>
            <?php endforeach ?>
            <!-- Phân trang danh sách đánh giá -->
            <nav aria-label="..." class="text-center">

                <ul class="pagination justify-content-center">
                 <!-- Vòng lặp để tạo phân trang -->
                    <?php for ($i = 1; $i <= $_SESSION['total_page']; $i++) { ?>

                    <li class="page-item <?= $_SESSION['page'] == $i ? 'active' : '' ?>">
                        <a class="page-link" href="?ma_hh=<?= $ma_hh ?>&page=<?= $i ?>"><?= $i ?></a>
                    </li>

                    <?php } ?>

                </ul>
            </nav>

        </div>
        <?php
         // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!isset($_SESSION['user'])) {
            echo '<h5 class="text-center"><i class="text-danger">Đăng nhập để bình luận về sản phẩm này</i></h5>';
        } else {

        ?>
         <!-- Form đăng bình luận -->
        <div class="comment-box">
            <h4>Đánh giá</h4>
            <form action="" method="POST">
                <!-- Thang đánh giá bằng số sao -->
                <div class="rating" > 
                    <input type="radio" name="rating" value="5" id="5" checked >
                    <label for="5" style="color: #B495C9;">☆</label>
                    <input type="radio" name="rating" value="4" id="4">
                    <label for="4" style="color: #B495C9;">☆</label>
                    <input type="radio" name="rating" value="3" id="3">
                    <label for="3" style="color: #B495C9;">☆</label>
                    <input type="radio" name="rating" value="2" id="2">
                    <label for="2" style="color: #B495C9;">☆</label>
                    <input type="radio" name="rating" value="1" id="1">
                    <label for="1" style="color: #B495C9;">☆</label>
                </div>
                <!-- Ô nhập nội dung bình luận -->
                <div class="comment-area" >
                    <textarea class="form-control" name="noi_dung" placeholder="Nội dung..." rows="4" style="border: 1px solid #B495C9;"></textarea>
                </div>
                <!-- Nút đăng bình luận -->
                <div class="text-right mt-4">
                    <button type="submit" class="btn reset send px-5">Đăng bình luận
                        <i class="fa fa-long-arrow-right ml-1"></i>
                    </button>
                </div>
            </form>
        </div>
        <?php
        } ?>
    </div>
</div>