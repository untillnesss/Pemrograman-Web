<div class="row mb-3">
	<div class="col-12 col-md-6">
		<h2>Ubah Data Barang</h2>
	</div>
</div>

<form action="<?php echo site_url('pertemuan4/barang/update/' . $barang['id_barang']); ?>" method="post" id="form-barang"></form>

<div class="row mb-4">
	<div class="col-12">
		<div class="card border border-primary">
			<div class="card-header bg-primary text-white">
				Informasi Barang
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label for="Kode_Barang" class="form-label">Kode Barang</label>
							<input form="form-barang" type="text" class="form-control" id="Kode_Barang" name="Kode_Barang" value="<?php echo isset($barang) ? $barang['kode_barang'] : set_value('kode_barang'); ?>" placeholder="Masukkan kode barang">
							<?php echo form_error('Kode_Barang', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label class="form-label mt-2" for="Nama_Barang">Nama Barang</label>
							<input form="form-barang" type="text" class="form-control" id="Nama_Barang" name="Nama_Barang" value="<?php echo isset($barang) ? $barang['nama_barang'] : set_value('nama_barang'); ?>" placeholder="Masukkan nama barang">
							<?php echo form_error('Nama_Barang', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label class="form-label mt-2" for="Kategori_Barang">Kategori Barang</label>
							<input form="form-barang" type="text" class="form-control" id="Kategori_Barang" name="Kategori_Barang" value="<?php echo isset($barang) ? $barang['kategori_barang'] : set_value('kategori_barang'); ?>" placeholder="Masukkan kategori barang">
							<?php echo form_error('Kategori_Barang', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="form-label mt-2" for="Deskripsi_Barang">Deskripsi Barang</label>
						<textarea form="form-barang" class="form-control" id="Deskripsi_Barang" name="Deskripsi_Barang" rows="3" placeholder="Masukkan deskripsi"><?php echo isset($barang) ? $barang['deskripsi_barang'] : set_value('deskripsi_barang'); ?></textarea>
						<?php echo form_error('Deskripsi_Barang', '<small class="text-danger">', '</small>'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mb-4">
	<div class="col-12">
		<div class="card border border-primary">
			<div class="card-header bg-primary text-white">
				Harga & Stok Barang
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label class="form-label" for="Harga_Jual">Harga Jual</label>
							<input form="form-barang" type="number" class="form-control" id="Harga_Jual" name="Harga_Jual" value="<?php echo isset($barang) ? $barang['harga_jual'] : set_value('harga_jual'); ?>" placeholder="Masukkan harga jual barang">
							<?php echo form_error('Harga_Jual', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label class="form-label" for="Harga_Beli">Harga Beli</label>
							<input form="form-barang" type="number" class="form-control" id="Harga_Beli" name="Harga_Beli" value="<?php echo isset($barang) ? $barang['harga_beli'] : set_value('harga_beli'); ?>" placeholder="Masukkan harga beli barang">
							<?php echo form_error('Harga_Beli', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<label class="form-label mt-2" for="Stok_Barang">Stok Barang</label>
							<input form="form-barang" type="number" class="form-control" id="Stok_Barang" name="Stok_Barang" value="<?php echo isset($barang) ? $barang['stok_barang'] : set_value('stok_barang'); ?>" placeholder="Masukkan stok barang">
							<?php echo form_error('Stok_Barang', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mb-3">
	<div class="col-12">
		<div class="card border border-primary">
			<div class="card-header bg-primary text-white">
				Informasi Supplier
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label class="form-label" for="Supplier_Barang">Suplier Barang</label>
							<input form="form-barang" type="text" class="form-control" id="Supplier_Barang" name="Supplier_Barang" value="<?php echo isset($barang) ? $barang['supplier_barang'] : set_value('supplier_barang'); ?>" placeholder="Masukkan nama suplier">
							<?php echo form_error('Supplier_Barang', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<label class="form-label mt-2" for="Tanggal_Masuk">Tanggal Masuk</label>
							<input form="form-barang" type="date" class="form-control" id="Tanggal_Masuk" name="Tanggal_Masuk" value="<?php echo isset($barang) ? $barang['tanggal_masuk'] : set_value('tanggal_masuk'); ?>">
							<?php echo form_error('Tanggal_Masuk', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mb-5">
	<div class="col-12 justify-content-end d-flex gap-3">
		<a href="<?php echo site_url('pertemuan4/barang'); ?>" class="btn btn-danger">Batal</a>
		<button form="form-barang" type="submit" class="btn btn-primary btn-block">Simpan</button>
	</div>
</div>

<div style="height: 1px;"></div>
