<main class="pt-5 mx-lg-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Dashboard</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-4">
				<div class="card mb-3">
					<div class="card-body d-flex">
						<h1 class="fs-1">
							<i class="bi bi-ticket"></i>
							40
						</h1>
					</div>
					<div class="card-footer">Pesanan Kamu</div>
				</div>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-12">
				<h2>Kamar yang Tersedia</h2>
			</div>
		</div>
		<div class="row">
			<?php
			if ($kamars->num_rows() > 0) {
				foreach ($kamars->result() as $kamar) {
					$kamar_harga = rupiah($kamar->harga);
					$kamar_jumlah = "Tersedia " . $kamar->jumlah . " Kamar";
			?>

					<div class="col-sm">
						<!-- Card Dark -->
						<div class="card">

							<!-- Card image -->
							<div class="view overlay">
								<div style="
									width: 100%; 
									height: 250px; 
									background-image: url('<?= site_url() ?>uploads/admin/kamar/<?= $kamar->gambar ?>');
									background-position: center;
									background-size: cover;
									border-radius: 0.375rem 0.375rem 0 0;
								"></div>
							</div>

							<!-- Card content -->
							<div class="card-body elegant-color white-text rounded-bottom">
								<!-- Title -->
								<h4 class="card-title text-info"><?= $kamar->tipe ?></h4>
								<hr class="hr-light">
								<!-- Text -->
								<h5><?= $kamar_harga ?></h5>
								<div class="">
									<p class=" text-info"><?= $kamar_jumlah ?></p>
									<!-- Link -->
									<a href="<?= site_url() ?>tamu_kamar/pesan_form/<?= $kamar->idkamar ?>" class="btn btn-info">Pesan</a>
								</div>

							</div>

						</div>
						<!-- Card Dark -->
					</div>
			<?php
				}
			}
			?>
		</div>
	</div>
</main>
