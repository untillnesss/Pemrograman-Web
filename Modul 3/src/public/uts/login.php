<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/helpers/Flash.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/controllers/LoginController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/helpers/Auth.php';

Auth::requireGuest();

LoginController::listen();
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

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>

<body class="d-flex align-items-center py-4 bg-body-tertiary justify-content-center">
    <main class="form-signin w-100 d-flex flex-column align-items-center">
        <i class="bi-coin" style="font-size: 7rem; color: cornflowerblue;"></i>
        <h1 class="h3 mb-3 fw-normal mb-5">Silahkan Masuk</h1>
        <form class="w-100" method="post" action="">
            <?php
            Flash::flash('successRegister');
            Flash::flash('error');
            ?>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value="<?= $_POST['email'] ?? '' ?>">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Masuk</button>
        </form>
        <a href="./register.php" class="mt-4">Belum punya akun? Daftar</a>
    </main>

    <?php require_once './templates/scripts.php' ?>
</body>

</html>
