<main class="pt-5 mx-lg-5">
	<div class="container">
		<div class="row mb-3">
			<div class="col-12 col-md-6">
				<h1>Data Kamar</h1>
			</div>
			<div class="col-12 col-md-6 d-md-flex justify-content-end">
				<form method="GET" id="form-search"></form>
				<div class="d-flex gap-2">
					<input class="form-control" type="text" name="keyword" placeholder="Cari Nama Kamar" form="form-search" value="<?= $keyword ?? '' ?>">
					<button class="btn btn-success" type="submit" form="form-search">Cari</button>
					<button class="btn btn-secondary" onclick="window.location.href='<?php echo base_url('admin/kamar_list'); ?>'" type="button">Reset</button>
					<button class="btn btn-primary" onclick="window.location.href='<?php echo base_url('admin/tambah_kamar_form'); ?>'" type="button">Tambah</button>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-12 table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Gambar</th>
							<th scope="col">Tipe</th>
							<th scope="col">Jumlah</th>
							<th scope="col">Harga</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php

						if ($kamars->num_rows() > 0) {
							foreach ($kamars->result() as $kamar) {
						?>
								<tr>
									<th scope="row">
										<div>
											<div class="circle-image" style="background-image: url('<?= site_url() ?>uploads/admin/kamar/<?= $kamar->gambar ?>');"></div>
										</div>
									</th>
									<td><?= $kamar->tipe ?></td>
									<td><?= $kamar->jumlah ?></td>
									<td><?= rupiah($kamar->harga) ?></td>
									<td class="">
										<div class="d-flex gap-2">
											<a class="btn btn-warning btn-sm" href="<?= site_url() ?>admin/ubah_kamar_form/<?= $kamar->idkamar ?>">Ubah</a>
											<a class="btn btn-danger btn-sm button-delete" href="<?= site_url() ?>admin/hapus_kamar/<?= $kamar->idkamar ?>">Hapus</a>
										</div>
									</td>
								</tr>
							<?php
							}
						} else { ?>
							<tr>
								<td colspan="10">Tidak ada data</td>
							</tr>
						<?php }
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>
