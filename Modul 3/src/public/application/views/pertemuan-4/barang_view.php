<div class="row mb-3">
	<div class="col-12 col-md-6">
		<h2>Data Barang</h2>
	</div>
	<div class="col-12 col-md-6 d-md-flex justify-content-end">
		<form method="GET" id="form-search"></form>
		<div class="d-flex gap-2">
			<input class="form-control" type="text" name="keyword" placeholder="Cari Nama Barang" form="form-search" value="<?= $keyword ?>">
			<button class="btn btn-success" type="submit" form="form-search">Cari</button>
			<button class="btn btn-secondary" onclick="window.location.href='<?php echo base_url('pertemuan4/barang'); ?>'" type="button">Reset</button>
			<button class="btn btn-primary" onclick="window.location.href='<?php echo base_url('pertemuan4/barang/create'); ?>'" type="button">Tambah</button>
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
				<th>Aksi</th>
			</tr>
			<?php if (empty($barang)) : ?>
				<tr>
					<td colspan="10">Tidak ada data barang</td>
				</tr>
			<?php else : ?>
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
						<td class="d-flex gap-2">
							<a href="<?php echo site_url('pertemuan4/barang/edit/' . $current['id_barang']); ?>" class="btn btn-warning btn-sm">Ubah</a>
							<a href="<?php echo site_url('pertemuan4/barang/delete/' . $current['id_barang']); ?>" class="btn btn-danger btn-sm button-delete">Hapus</a>
						</td>
					</tr>
				<?php } ?>
			<?php endif ?>
		</table>
	</div>
</div>
