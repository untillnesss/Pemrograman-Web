<main class="pt-5 mx-lg-5">
	<div class="container">
		<div class="row mb-3">
			<div class="col-12 col-md-6">
				<h2>Data Tamu</h2>
			</div>
			<div class="col-12 col-md-6 d-md-flex justify-content-end">
				<form method="GET" id="form-search"></form>
				<div class="d-flex gap-2">
					<input class="form-control" type="text" name="keyword" placeholder="Cari Tamu" form="form-search" value="<?= $keyword ?? '' ?>">
					<button class="btn btn-success" type="submit" form="form-search">Cari</button>
					<button class="btn btn-secondary" onclick="window.location.href='<?php echo base_url('admin/tamu_list'); ?>'" type="button">Reset</button>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12 table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Username</th>
							<th scope="col">Nama Asli</th>
							<th scope="col">Alamat</th>
							<th scope="col">Telepon</th>
						</tr>
					</thead>
					<tbody>
						<?php

						if (count($tamus) > 0) {
							foreach ($tamus as $tamu) {
						?>
								<tr>
									<td><?= $tamu['username'] ?></td>
									<td><?= $tamu['nama'] ?></td>
									<td><?= $tamu['alamat'] ?></td>
									<td><?= $tamu['telepon'] ?></td>
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
