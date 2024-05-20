<?php
require_once './helpers/Auth.php';
require_once './services/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/controllers/HutangController.php';

Auth::requireLogin();

$db = DB::connector();

$data = HutangController::prepareUpdate();
HutangController::update();
?>

<?php require_once './templates/head.php' ?>

<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/templates/navbar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Ubah Hutang</h5>
                    </div>
                    <?php if (empty($data)) : ?>
                        <div class="card-body d-flex justify-content-center flex-column align-items-center">
                            <div>
                                <h3>Data tidak ditemukan, atau tidak valid!</h3>
                            </div>
                            <div>
                                <a href="./dashboard.php" class="btn btn-warning">Kembali</a>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="card-body">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama yang Berhutang</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama Orang yang Berhutang Kepadamu" name="name" form="form-add" required value="<?= $data['name'] ?? '' ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Jumlah</label>
                                    <input type="number" class="form-control" id="amount" placeholder="Masukkan Nominal hutang" name="amount" form="form-add" required value="<?= $data['amount'] ?? '' ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="date" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="date" placeholder="Masukkan Nominal hutang" name="date" form="form-add" required value="<?= $data['date'] ?? '' ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Keterangan (Opsional)</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Tuliskan Keterangan (Opsional)" form="form-add"><?= $data['description'] ?? '' ?></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <a href="./dashboard.php" class="btn btn-warning">Kembali</a>
                                <button class="btn btn-success" type="submit" form="form-add">Simpan</button>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

    <form action="" method="post" id="form-add">
        <input type="hidden" value="<?= $data['id'] ?? 0 ?>" name="id">
    </form>
</body>