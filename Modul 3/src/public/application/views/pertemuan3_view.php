<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data barang</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg bg-primary mb-4" data-bs-theme="dark">
		<div class="container">
			<a class="navbar-brand" href="./dashboard.php">SAID PRAKTISI MENGAJAR - 3</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<!-- <a class="nav-link active" aria-current="page" href="./dashboard.php">Dashboard</a> -->
					</li>
				</ul>
			</div>

			<!-- <form class="d-flex" role="search">
				<a class="btn btn-danger" href="./logout.php">Logout</a>
			</form> -->
		</div>
	</nav>

	<div class="container">
		<div class="row mb-3">
			<div class="col-12 col-md-6">
				<h2>Data Barang</h2>
			</div>
			<div class="col-12 col-md-6 d-md-flex justify-content-end">
				<form method="GET" id="form-search"></form>
				<div class="d-flex gap-2">
					<input class="form-control" type="text" name="keyword" placeholder="Cari Nama Barang" form="form-search" value="<?= $keyword ?>">
					<button class="btn btn-success" type="submit" form="form-search">Cari</button>
					<button class="btn btn-secondary" onclick="window.location.href='<?php echo base_url('pertemuan3'); ?>'" type="button">Reset</button>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12 table-responsive">
				<table class="table table-striped">
					<tr>
						<th>Kode</th>
						<th>Nama</th>
						<th>Kategori</th>
						<th>Deskripsi</th>
						<th>Harga Beli</th>
						<th>Harga Jual</th>
						<th>Stok</th>
						<th>Supplier</th>
						<th>Tanggal Masuk</th>
					</tr>
					<?php foreach ($barang as $current) { ?>
						<tr>
							<td><?= $current['kode_barang'] ?? '-'; ?></td>
							<td><?= $current['nama_barang'] ?? '-'; ?></td>
							<td><?= $current['kategori_barang'] ?? '-'; ?></td>
							<td><?= $current['deskripsi_barang'] ?? '-'; ?></td>
							<td><?= rupiah($current['harga_jual'] ?? '0'); ?></td>
							<td><?= rupiah($current['harga_beli'] ?? '0'); ?></td>
							<td><?= $current['stok_barang'] ?? '-'; ?></td>
							<td><?= $current['supplier_barang'] ?? '-'; ?></td>
							<td><?= formatDate($current['tanggal_masuk'] ?? now()) ?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>

</body>

</html>
