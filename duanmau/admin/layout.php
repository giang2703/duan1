<?php
check_login();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Quản Trị</title>
    <link rel="icon" href="<?= $CONTENT_URL ?>/images/logo.jpg" type="image/gif" sizes="16x16">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/bootstrap.min.css" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/all.min.css" type="text/css">
    <!-- Slick slider -->
    <!-- <link rel="stylesheet" href="css/slick.css" type="text/css">
    <link rel="stylesheet" href="css/slick-theme.css" type="text/css">
    <script src="js/slick.min.js"></script> -->

    <!-- Custom -->
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/dashboard.css" type="text/css">

</head>

<body>
    <!-- Page Preloader -->
    <div class="wrapper">
        <!-- -===========================Menu ===================-->
        <?php
        require "menu.php";
        ?>
        <div id="body" class="active">
            <!-- navbar navigation component -->
            <nav class="navbar navbar-expand-lg navbar-white bg-white">
                <button type="button" id="sidebarCollapse" class="btn btn-light">
                    <i class="fas fa-bars"></i><span></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                    if (isset($_SESSION['user']) && $_SESSION['user']['hinh'] != "") { ?>
                                    <img src="<?= $UPLOAD_URL . "/users/" . $_SESSION['user']['hinh'] ?>" width="30"
                                        height="30" class="mb-2 object-fit-cover rounded-circle" alt="">
                                    <?php } else { ?>
                                    <i class="fa fa-user primary-color"></i>
                                    <?php }  ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                                    <ul class="nav-list">
                                        <li><a href="<?= $SITE_URL . '/tai-khoan/dang-nhap.php?btn_logout' ?>"
                                                class="dropdown-item"><i class="fas fa-sign-out-alt"></i>
                                                Đăng xuất</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- end of navbar navigation -->
            <div class="content">
                <!-- -===========================home ===================-->

                <?php include $VIEW_NAME; ?>

            </div>
        </div>
    </div>



    <!-- Js -->
    <script src="<?= $CONTENT_URL ?>/js/jquery-3.6.0.min.js"></script>
    <script src="<?= $CONTENT_URL ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $CONTENT_URL ?>/js/jquery.validate.js"></script>
    <script src="<?= $CONTENT_URL ?>/js/main.js"></script>
    <script src="<?= $CONTENT_URL ?>/js/validation.js"></script>


    <script>
    // =============Check delete=================//
    function checkDelete() {
        var x = confirm("Bạn chắc muốn xóa chứ?")
        if (x) {
            return true;
        } else {
            return false;
        }

    }
    // =============Auto resize textarea=================//

    function expandTextarea(id) {
        document.getElementById(id).addEventListener('keyup', function() {
            this.style.overflow = 'hidden';
            this.style.minHeight = '106.8px';
            this.style.height = 0;
            this.style.height = this.scrollHeight + 'px';
        }, false);
    }
    expandTextarea('txtarea');
    </script>


    <!-- Toast message -->
    <script>
    $(document).ready(function() {
        $('.toast').toast('show');
    });
    </script>

    <!--  chọn và bỏ chọn các loại trên trang list.php. -->
    <script>
    $(document).ready(function() {
        var checkboxItem = ":checkbox";
        $("#select-all").click(function() {
            if (this.checked) {
                $(checkboxItem).each(function() {
                    this.checked = true;
                });
            } else {
                $(checkboxItem).each(function() {
                    this.checked = false;
                });
            }
        });

        $("#deleteAll").click(function() {
            if ($(":checked").length === 0) {
                alert("Vui lòng chọn ít nhất một mục!");
                return false;
            }
        })
    });
    </script>
</body>

</html>