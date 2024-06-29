<main class="pt-5 mx-lg-5">
	<div class="container">
		<div class="row mb-3">
			<div class="col-12 col-md-6">
				<h2>Tambah Fasilitas</h2>
			</div>
		</div>

		<div class="row mb-4">
			<div class="col-12">
				<div class="card border border-primary">
					<div class="card-header bg-primary text-white">
						Informasi Fasilitas
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="name" class="form-label">Nama Fasilitas</label>
									<input required form="form-barang" type="text" class="form-control" id="name" name="name" value="<?php echo isset($barang) ? $barang['name'] : set_value('name'); ?>" placeholder="Masukkan nama fasilitas">
									<?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="row mb-5">
			<div class="col-12 justify-content-end d-flex gap-2">
				<a href="<?php echo site_url('admin/fasilitas_list'); ?>" class="btn btn-danger">Batal</a>
				<button form="form-barang" type="submit" class="btn btn-primary btn-block">Simpan</button>
			</div>
		</div>

		<form class="text-center" method="post" action="<?= site_url() ?>admin/tambah_fasilitas_save" enctype="multipart/form-data" id="form-barang">
		</form>
	</div>
</main>
