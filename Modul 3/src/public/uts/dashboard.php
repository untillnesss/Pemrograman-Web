<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/helpers/Flash.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/controllers/HutangController.php';
require_once './helpers/Auth.php';
require_once './services/DB.php';
Auth::requireLogin();

$db = DB::connector();

HutangController::listen();
$stats = HutangController::stats();
?>

<?php require_once './templates/head.php' ?>

<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/templates/navbar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <h5 class="card-header">Total Hutang</h5>
                    <div class="card-body">
                        <h1 class="card-title"><?= Helpers::rupiah($stats[0]) ?></h1>
                        <p class="card-text">Jumlah Total semua hutang yang belum lunas</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 mt-4 mt-md-0">
                <div class="card">
                    <h5 class="card-header">Hutang Lunas</h5>
                    <div class="card-body">
                        <h1 class="card-title"><?= Helpers::rupiah($stats[1]) ?></h1>
                        <p class="card-text">Jumlah Total semua hutang yang sudah lunas</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <?php
                Flash::flash('flash');
                ?>
                <div class="card">
                    <h5 class="card-header d-flex justify-content-between align-items-center">
                        <div>Daftar Hutang</div>
                        <a href="./add.php" class="btn btn-success">Tambah</a>
                    </h5>
                    <div class="card-body">
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Catatan</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Sudah Lunas?</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty(HutangController::list())) : ?>
                                    <tr>
                                        <td colspan="6">Tidak ada data</td>
                                    </tr>
                                <?php else : ?>
                                    <?php foreach (HutangController::list() as $i => $row) :
                                        $isSettled = (($row['is_settled'] ?? '0') == 1);
                                    ?>
                                        <tr>
                                            <td><?= $row['name'] ?? '' ?></td>
                                            <td><?= $row['description'] ?? '' ?></td>
                                            <td><?= Helpers::rupiah($row['amount']) ?? Helpers::rupiah(0) ?></td>
                                            <td><?= Helpers::formatDate($row['date']) ?? '' ?></td>
                                            <td>
                                                <div class="badge <?= $isSettled ? 'text-bg-success' : 'text-bg-warning' ?>"><?= $isSettled ? 'Lunas' : 'Belum Lunas'  ?></div>
                                            </td>
                                            <td class="d-flex gap-1">
                                                <form action="" method="post" id="form-hapus-<?= $i ?>">
                                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                    <input type="hidden" name="action" value="hapus">
                                                </form>
                                                <button class="btn btn-danger" type="submit" form="form-hapus-<?= $i ?>">Hapus</button>
                                                <a class="btn btn-warning" href="./edit.php?id=<?= $row['id'] ?>">Ubah</a>
                                                <?php if (!$isSettled) : ?>
                                                    <form action="" method="post" id="form-lunas-<?= $i ?>">
                                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                        <input type="hidden" name="action" value="lunas">
                                                    </form>
                                                    <button class="btn btn-success" type="submit" form="form-lunas-<?= $i ?>">Lunas</button>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once './templates/scripts.php' ?>
</body>

</html>
