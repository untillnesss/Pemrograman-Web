<?php
require_once './helpers/Auth.php';
require_once './services/DB.php';
$db = DB::connector();
?>

<?php require_once './templates/head.php' ?>

<body class="d-flex" style="height: 100vh; justify-content: center; align-items: center;">
    <div class="px-4 py-5 text-center">
        <i class="bi-coin" style="font-size: 7rem; color: cornflowerblue;"></i>
        <h1 class="display-5 fw-bold text-body-emphasis">U-TANGAN</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Kendalikan Keuanganmu dengan Mudah! Aplikasi pencatatan hutang membantu Anda mengelola keuangan dengan lebih rapi dan terorganisir, terutama dalam hal utang piutang. Aplikasi ini menawarkan berbagai fitur yang memudahkan Anda melacak hutang dan piutang, mengatur pengingat pembayaran,</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="./register.php" class="btn btn-primary btn-lg px-4 gap-3">Daftar Sekarang</a>
                <a href="./login.php" class="btn btn-outline-secondary btn-lg px-4">Masuk</a>
            </div>
        </div>
    </div>
    <?php require_once './templates/scripts.php' ?>
</body>

</html>
