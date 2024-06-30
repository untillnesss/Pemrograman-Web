<main class="pt-5 mx-lg-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Data Reservasi > Pembayaran</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-6 mb-3">

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
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-6 mb-3">
				<div class="card border border-primary">
					<div class="card-header bg-primary text-white">
						Konfirmasi Pembayaran
					</div>

					<div class="card-body">
						<!-- Default form contact -->
						<form class="" method="post" action="<?= site_url() ?>Tamu_kamar/pembayaran_save" enctype="multipart/form-data">

							<input type="hidden" class="form-control" id="idpesan" name="idpesan" placeholder="Id Kamar" value="<?= $this->uri->segment(3) ?>">

							<div class="form-group row mb-2">
								<label for="jumlah" class="col-sm-4 col-form-label">Jumlah Pembayaran</label>
								<div class="col-sm-8">
									<input type="" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Pembayaran" value="<?= rupiah($pemesanan->totalbayar) ?>" readonly>
								</div>
							</div>
							<div class="form-group row mb-2">
								<label for="jumlah" class="col-sm-4 col-form-label">Bank</label>
								<div class="col-sm-8">
									<input type="" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Pembayaran" value="<?= $pemesanan->bank ?>" readonly>
								</div>
							</div>

							<div class="form-group row mb-2">
								<label for="norek" class="col-sm-4 col-form-label">No. Rekening</label>
								<div class="col-sm-8">
									<input type="" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Pembayaran" value="<?= $pemesanan->norek ?>" readonly>
								</div>
							</div>
							<div class="form-group row mb-2">
								<label for="namarek" class="col-sm-4 col-form-label">Atas Nama</label>
								<div class="col-sm-8">
									<input type="" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Pembayaran" value="<?= $pemesanan->namarek ?>" readonly>
								</div>
							</div>

							<div class="form-group row mb-3">
								<label for="formFile" class="form-label col-sm-4 col-form-label">Bukti Transfer</label>
								<div class="col-sm-8">
									<a href="<?= site_url() ?>uploads/tamu/bukti_pembayaran/<?= $pemesanan->bukti_pembayaran ?>" target="_blank">
										<div class="border" style="
											width: 100%; 
											height: 250px; 
											background-image: url('<?= site_url() ?>uploads/tamu/bukti_pembayaran/<?= $pemesanan->bukti_pembayaran ?>');
											background-position: center;
											background-size: cover;
											border-radius: 0.375rem 0.375rem 0 0;
										"></div>
									</a>
								</div>
							</div>
							<a class="btn btn-success button-confirm" href="<?= site_url() ?>admin/konfirmasi_pembayaran/<?= $pemesanan->idpesan ?>">KONFIRMASI</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
