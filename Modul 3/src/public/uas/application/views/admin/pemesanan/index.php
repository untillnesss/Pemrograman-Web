<main class="pt-5 mx-lg-5">
	<div class="container">
		<div class="row mb-3">
			<div class="col-12 col-md-6">
				<h2>Data Reservasi</h2>
			</div>
			<div class="col-12 col-md-6 d-md-flex justify-content-end">
				<form method="GET" id="form-search"></form>
				<div class="d-flex gap-2">
					<input class="form-control" type="text" name="keyword" placeholder="Cari Pesanan" form="form-search" value="<?= $keyword ?? '' ?>">
					<button class="btn btn-success" type="submit" form="form-search">Cari</button>
					<button class="btn btn-secondary" onclick="window.location.href='<?php echo base_url('admin/pemesanan_list'); ?>'" type="button">Reset</button>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12 table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Nama</th>
							<th scope="col">Alamat</th>
							<th scope="col">No. Telp</th>
							<th scope="col">Tipe Kamar</th>
							<th scopre="col">Tanggal Reservasi</th>
							<th scope="col">Tanggal check-in</th>
							<th scope="col">Tanggal Check-out</th>
							<th scope="col">Total Bayar</th>
							<th scope="col">Status</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (count($pemesanans) > 0) {
							foreach ($pemesanans as $row) {
								$tanggal_pemesanan =  date('d-m-Y', strtotime($row['tglpesan']));
								$tanggal_masuk = date('d-m-Y', strtotime($row['tglmasuk']));
								$tanggal_keluar = date('d-m-Y', strtotime($row['tglkeluar']));

						?>
								<tr>
									<td><?= $row['nama'] ?></td>
									<td><?= $row['alamat'] ?></td>
									<td><?= $row['telepon'] ?></td>
									<td><?= $row['tipe'] ?></td>
									<td><?= formatDate($tanggal_pemesanan) ?></td>
									<td><?= formatDate($tanggal_masuk) ?></td>
									<td><?= formatDate($tanggal_keluar) ?></td>
									<td><?= rupiah($row['totalbayar']) ?></td>
									<td><?= $row['status'] ?></td>
									<th scope="row">
										<a class="btn btn-success btn-sm" href="<?= site_url() ?>admin/konfirmasi_pembayaran_form/<?= $row['idpesan'] ?>" data-toggle="modal" data-target="#modalView" data-id="<?= $row['idpesan'] ?>" data-nama="<?= $row['nama'] ?>" data-jumlahbayaran="<?= $row['jumlah_bayaran'] ?>" data-bank="<?= $row['bank'] ?>" data-norek="<?= $row['norek'] ?>" data-namarek="<?= $row['namarek'] ?>" data-gambar="<?= site_url() ?>uploads/tamu/bukti_pembayaran/<?= $row['bukti_pembayaran'] ?>"><i class="bi bi-check2-circle"></i>Konfirmasi</a>
									</th>
								</tr>

						<?php
							}
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>
