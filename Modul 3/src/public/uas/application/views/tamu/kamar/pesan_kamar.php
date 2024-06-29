<main class="pt-5 mx-lg-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Pesan Kamar</h2>
			</div>
		</div>
		<?php
		if (isset($fetch_single) && isset($data_user)) {
			//inisialisasi kamar
			$kamar = $fetch_single;
			$kamar_harga = rupiah($kamar->harga);

			//inisialisasi user
			$user = $data_user->row();
		?>
			<div class="row">
				<div class="col-12 col-md-6 mb-3">
					<div class="card">
						<div class="view overlay">
							<div style="
									width: 100%; 
									height: 400px; 
									background-image: url('<?= site_url() ?>uploads/admin/kamar/<?= $kamar->gambar ?>');
									background-position: center;
									background-size: cover;
									border-radius: 0.375rem 0.375rem 0 0;
								"></div>
						</div>

						<!-- Card image -->
						<div class="border-bottom border-light card-body">
							<h3 class="card-title text-info"><?= $kamar->tipe ?></h3>
							<h4 class="mb-3"><?= $kamar_harga ?></h4>
							<h5 class="">Fasilitas</h5>
							<?php if (!empty($fasilitas)) { ?>
								<ul style="padding-left: 1rem;">
									<?php foreach ($fasilitas ?? [] as $fasilita) { ?>
										<li><?= $fasilita['name'] ?></li>
									<?php } ?>
								</ul>
							<?php } else { ?>
								<small>Belum ada fasilitas</small>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 mb-3">
					<div class="card border border-primary">
						<div class="card-header bg-primary text-white">
							Bio Data Pemesanan
						</div>
						<!--Card content-->
						<div class="card-body px-lg-5 mt-4 pt-0">
							<!-- Default form contact -->
							<form class="" method="post" action="<?= site_url() ?>Tamu_kamar/pesan_save">

								<input type="hidden" class="form-control" id="idkamar" name="idkamar" value="<?= $kamar->idkamar ?>">
								<input type="hidden" class="form-control" id="tipe" name="tipe" value="<?= $kamar->tipe ?>">
								<input type="hidden" class="form-control" id="harga" name="harga" value="<?= $kamar->harga ?>">

								<div class="form-group mb-1 row">
									<label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= $user->nama ?>">
									</div>
								</div>
								<div class="form-group mb-1 row">
									<label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
									<div class="col-sm-8">
										<textarea class="form-control rounded-0" id="alamat" name="alamat" rows="3" placeholder="Alamat"><?= $user->alamat ?></textarea>
									</div>
								</div>
								<div class="form-group mb-1 row">
									<label for="notelp" class="col-sm-4 col-form-label">No. Telfon/hp</label>
									<div class="col-sm-8">
										<input type="number" class="form-control" id="notelp" name="notelp" placeholder="No. Telfon/hp" value="<?= $user->telepon ?>">
									</div>
								</div>
								<div class="form-group mb-1 row">
									<label for="tglmasuk" class="col-sm-4 col-form-label">Tanggal Check-In</label>
									<div class="col-sm-8">
										<input type="date" class="form-control datepicker" id="tglmasuk" name="tglmasuk" placeholder="Tanggal Check-In">
									</div>
								</div>
								<div class="form-group mb-1 row">
									<label for="tglkeluar" class="col-sm-4 col-form-label">Tanggal Check-Out</label>
									<div class="col-sm-8">
										<input type="date" class="form-control" id="tglkeluar" name="tglkeluar" placeholder="Tanggal Check-Out">
									</div>
								</div>
								<div class="form-group mb-1 row">
									<label for="jumlah" class="col-sm-4 col-form-label">Jumlah Kamar</label>
									<div class="col-sm-8">
										<div class="input-group">
											<input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Kamar" value="1" min="1">
											<span class="input-group-text">KAMAR</span>
										</div>
									</div>
								</div>
								<div class="form-group mb-1 row">
									<label for="lama_menginap" class="col-sm-4 col-form-label">Lama Menginap</label>
									<div class="col-sm-8">
										<div class="input-group">
											<input type="text" class="form-control" id="lama_menginap" name="lama_menginap" placeholder="Lama Menginap" readonly>
											<span class="input-group-text">HARI</span>
										</div>
									</div>
								</div>
								<div class="form-group mb-1 row">
									<label for="total_biaya" class="col-sm-4 col-form-label">Total Biaya</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="total_biaya" name="total_biaya" placeholder="Total Biaya" readonly>
									</div>
								</div>
								<!-- Send button -->
								<button class="mt-3 btn btn-primary btn-block" type="submit">PESAN SEKARANG</button>

							</form>
							<!-- Default form contact -->
						</div>
					</div>
				</div>
			<?php
		}
			?>
			</div>
	</div>
</main>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
	Date.prototype.toDateInputValue = (function() {
		var local = new Date(this);
		local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
		return local.toJSON().slice(0, 10);
	});

	const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds

	function onChangeTanggal() {
		if (Date.parse($('#tglkeluar').val()) > Date.parse($('#tglmasuk').val())) {
			//menghitung lama menginap
			$('#lama_menginap').val(Math.round(Math.abs((Date.parse($('#tglkeluar').val()) - Date.parse($('#tglmasuk').val())) / oneDay)) + 1);

		} else {
			$('#lama_menginap').val(1);
		}

		//menghitung total biaya
		$('#total_biaya').val($('#harga').val() * $('#jumlah').val() * $('#lama_menginap').val());
	}

	$(document).ready(function() {
		$('#tglmasuk').val(new Date().toDateInputValue());
		$('#tglkeluar').val(new Date().toDateInputValue());

		onChangeTanggal()

		$("#tglmasuk").change(function() {
			onChangeTanggal()
		});

		$("#tglkeluar").change(function() {
			onChangeTanggal()
		});

		$("#jumlah").change(function() {
			onChangeTanggal()
		});
	});
</script>
