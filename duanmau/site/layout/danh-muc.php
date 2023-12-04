<style>
.category_1 {
    display: flex;
    flex-direction: row;
    background-color: rgba(255, 255, 255, 1); 
    padding: 10px; 
    border-radius: 5px; 
}

.category_1 a {
    color: black;
    text-decoration: none; /* Loại bỏ gạch chân dưới link */
    margin-right: 5px; 
}

.category_1 a:hover {
    color: #B495C9;
}

.category_1 a:not(:last-child)::after {
    content: "|"; 
    margin-left: 5px; /* Khoảng cách giữa kí tự "|" và link */
    color: #000; 
}
</style>

<div class="category_1">
<a href="<?= $SITE_URL ?>/trang-chinh/index.php?san-pham"> Tất cả </a>
    <?php foreach ($ds_loai as $loai) : ?>
        
        <a href="<?= $SITE_URL . "/hang-hoa/liet-ke.php?ma_loai=" . $loai['ma_loai'] ?>"><?= $loai['ten_loai'] ?></a>
    <?php endforeach ?>
</div>
