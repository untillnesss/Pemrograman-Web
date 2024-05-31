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
