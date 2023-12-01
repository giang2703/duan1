<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Beauty Fashion</title>
    <link rel="icon" href="<?= $CONTENT_URL ?>/images/logo.png" type="image/gif" sizes="16x16">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/bootstrap.min.css" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/all.min.css" type="text/css">
    <!-- Slick slider -->
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/slick.css" type="text/css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/slick-theme.css" type="text/css">

    <!-- Custom -->
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/style.css" type="text/css">

</head>

<body>
    <!-- Page Preloader -->

    <div id="preloader">
        <div class="loader"></div>
    </div>

    <!-- Header -->
    <header class="sticky-top">
        <?php require "../layout/menu.php"; ?>
    </header>


    <main>
        <!-- Tùy từng request hiện view tương ứng -->
        <?php include $VIEW_NAME ?>
    </main>

    <!-- Footer -->
    <footer class="text-light mt-5">
        <?php require "../layout/footer.php"; ?>
    </footer>

    <!-- Js -->
    <script src="<?= $CONTENT_URL ?>/js/jquery-3.6.0.min.js"></script>
    <script src="<?= $CONTENT_URL ?>/js/bootstrap.min.js"></script>
    <script src="<?= $CONTENT_URL ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $CONTENT_URL ?>/js/slick.min.js"></script>
    <script src="<?= $CONTENT_URL ?>/js/jquery.validate.js"></script>
    <script src="<?= $CONTENT_URL ?>/js/main.js"></script>
    <script src="<?= $CONTENT_URL ?>/js/validation.js"></script>
</body>

</html>