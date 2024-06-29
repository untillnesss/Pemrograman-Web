<main class="pt-5 mx-lg-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Reservasi</h2>
			</div>
		</div>
		<div class="row">
			<?php
			if ($pemesanans->num_rows() > 0) {
				foreach ($pemesanans->result() as $pemesanan) {
					$tglpembayaran = date("Y-m-d", strtotime($pemesanan->batasbayar));
					$jampembayaran = date("H:i:s", strtotime($pemesanan->batasbayar));

			?>

					<div class="col-4">
						<!-- Card Dark -->
						<div class="card">
							<!-- Card image -->
							<div class="view overlay">
								<div style="
									width: 100%; 
									height: 250px; 
									background-image: url('<?= site_url() ?>uploads/admin/kamar/<?= $pemesanan->gambar ?>');
									background-position: center;
									background-size: cover;
									border-radius: 0.375rem 0.375rem 0 0;
								"></div>
							</div>

							<!-- Card content -->
							<div class="card-body elegant-color white-text rounded-bottom">
								<!-- Title -->
								<h4 class="card-title text-primary"><?= $pemesanan->tipe ?></h4>
								<p class="text-helper mb-1">Tanggal Pemesanan : <?= $pemesanan->tglpesan ?></p>
								<p class="">Atas Nama : <?= $pemesanan->nama ?></p>

								<hr class="hr-light">
								<!-- Text -->
								<div class="">
									<p class="mb-1">Tanggal Check-In : <?= $pemesanan->tglmasuk ?></p>
									<p class="mb-1">Tanggal Check-Out : <?= $pemesanan->tglkeluar ?></p>
									<p class="mb-4">Lama Menginap : <?= $pemesanan->lamahari ?> Hari</p>
									<h4 class="mb-3">Total Bayar <?= rupiah($pemesanan->totalbayar) ?></h4>
									<?php

									if ($pemesanan->status == 'Pending...') {
										$status = "<span class='badge bg-warning'>" . $pemesanan->status . "</span>";
									?>

										<div class="alert alert-warning">
											<p class="mb-0">Belum Bayar</p>
										</div>
										<a href="<?= site_url() ?>tamu_kamar/pembayaran_form/<?= $pemesanan->idpesan ?>" class="btn btn-primary">BAYAR</a>
									<?php
									} else if ($pemesanan->status == 'Konfirmasi') {
										$status = "<span class='text-default'>Menggunggu " . $pemesanan->status . "</span>";
									?>

										<div class="alert alert-info">
											<p class="mb-0">Menunggu Konfirmasi</p>
										</div>

									<?php

									} else if ($pemesanan->status == 'Dibatalkan') {
										$status = "<span class='text-danger'>" . $pemesanan->status . "</span>";
									?>

										<div class="alert alert-danger">
											<p class="mb-0">Dibatalkan</p>
										</div>
									<?php

									} else if ($pemesanan->status == 'Berhasil') {
										$status = "<span class='text-success'>" . $pemesanan->status . "</span>";
									?>
										<div class="alert alert-success">
											<p class="mb-0">Diterima</p>
										</div>
									<?php

									} else {
									?>

										<div class="alert alert-light">
											<p class="mb-0">Tidak diketahui</p>
										</div>
									<?php
									}

									?>
								</div>

							</div>

						</div>
					</div>

				<?php
				}
			} else {
				?>
				<div class="col-12">
					<div class="alert alert-info">
						Belum ada reservasi
					</div>
				</div>
			<?php } ?>

		</div>
	</div>
</main>
