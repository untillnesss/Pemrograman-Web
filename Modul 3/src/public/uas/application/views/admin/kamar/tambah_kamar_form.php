<main class="pt-5 mx-lg-5">
	<div class="container">
		<div class="row mb-3">
			<div class="col-12 col-md-6">
				<h1>Tambah Kamar</h1>
			</div>
		</div>

		<div class="row mb-4">
			<div class="col-12">
				<div class="card border border-primary">
					<div class="card-header bg-primary text-white">
						Informasi Kamar
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="tipe" class="form-label">Nama Kamar</label>
									<input required form="form-barang" type="text" class="form-control" id="tipe" name="tipe" value="<?php echo isset($barang) ? $barang['tipe'] : set_value('tipe'); ?>" placeholder="Masukkan nama kamar">
									<?php echo form_error('tipe', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label class="form-label mt-2" for="jumlah">Jumlah Kamar</label>
									<input required form="form-barang" type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo isset($barang) ? $barang['jumlah'] : set_value('jumlah'); ?>" placeholder="Masukkan jumlah kamar">
									<?php echo form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label class="form-label mt-2" for="harga">Harga</label>
									<input required form="form-barang" type="number" class="form-control" id="harga" name="harga" value="<?php echo isset($barang) ? $barang['harga'] : set_value('harga'); ?>" placeholder="Masukkan harga kamar">
									<?php echo form_error('harga', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="mb-3 mt-2">
								<label for="gambar" class="form-label">Gambar</label>
								<input class="form-control" type="file" id="gambar" name="gambar" form="form-barang" required accept="image/*">
								<?php if (isset($error['error'])) : ?>
									<small class="text-danger"><?= $error['error'] ?? '' ?></small>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="row mb-5">
			<div class="col-12 justify-content-end d-flex gap-2">
				<a href="<?php echo site_url('admin/kamar_list'); ?>" class="btn btn-danger">Batal</a>
				<button form="form-barang" type="submit" class="btn btn-primary btn-block">Simpan</button>
			</div>
		</div>

		<form class="text-center" method="post" action="<?= site_url() ?>admin/tambah_kamar_save" enctype="multipart/form-data" id="form-barang">
		</form>
	</div>
</main>
