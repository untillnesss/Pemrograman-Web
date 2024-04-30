<?php

require_once './controllers/RegisterController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/helpers/Flash.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/helpers/Auth.php';

if (!isset($_SESSION)) {
    session_start();
}

Auth::requireGuest();


RegisterController::listen();

?>
<?php require_once './templates/head.php' ?>

<style>
    html,
    body {
        height: 100%;
    }

    .form-signin {
        max-width: 630px;
        padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-floating {
        margin-bottom: 10px;
    }
</style>

<body class="d-flex align-items-center py-4 bg-body-tertiary justify-content-center">
    <main class="form-signin w-100 d-flex flex-column align-items-center">
        <i class="bi-coin" style="font-size: 7rem; color: cornflowerblue;"></i>
        <h1 class="h3 mb-3 fw-normal mb-5">Silahkan Mendaftar</h1>
        <form class="w-100" method="post" action="">
            <?php
            Flash::flash('validation');
            ?>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Masukkan Nama" name="nama" required value="<?= $_POST['nama'] ?? '' ?>">
                <label for="floatingInput">Nama</label>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="Masukkan Email" name="email" required value="<?= $_POST['email'] ?? '' ?>">
                <label for="floatingInput">Email</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingInput" placeholder="Masukkan Password" name="password" required>
                <label for="floatingInput">Password</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Ketik Ulang Password" name="password_confirm" required>
                <label for="floatingPassword">Konfirmasi Password</label>
            </div>

            <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Daftar</button>
        </form>
        <a href="./login.php" class="mt-4">Sudah punya akun? Masuk</a>
    </main>

    <?php require_once './templates/scripts.php' ?>
</body>

</html>