<?php
require_once './helpers/Auth.php';
require_once './services/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/controllers/HutangController.php';

Auth::requireLogin();

$db = DB::connector();

HutangController::store();
?>

<?php require_once './templates/head.php' ?>

<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/templates/navbar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Tamabah Hutang</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama yang Berhutang</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama Orang yang Berhutang Kepadamu" name="name" form="form-add" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="amount" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="amount" placeholder="Masukkan Nominal hutang" name="amount" form="form-add" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" placeholder="Masukkan Nominal hutang" name="date" form="form-add" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Keterangan (Opsional)</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Tuliskan Keterangan (Opsional)" form="form-add"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <a href="./dashboard.php" class="btn btn-warning">Kembali</a>
                            <button class="btn btn-success" type="submit" form="form-add">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="" method="post" id="form-add"></form>
</body>