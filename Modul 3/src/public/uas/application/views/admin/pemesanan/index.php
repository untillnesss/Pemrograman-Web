<main class="pt-5 mx-lg-5">
	<div class="container">
		<div class="row mb-3">
			<div class="col-12 col-md-6">
				<h2>Data Pemesanan</h2>
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
							<th scopre="col">Tanggal Pemesanan</th>
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
									<td><?= $tanggal_pemesanan ?></td>
									<td><?= $tanggal_masuk ?></td>
									<td><?= $tanggal_keluar ?></td>
									<td><?= $row['totalbayar'] ?></td>
									<td><?= $row['status'] ?></td>
									<th scope="row">
										<a class="open-modal text-info" href="<?= site_url() ?>admin/konfirmasi_pembayaran_form/<?= $row['idpesan'] ?>" data-toggle="modal" data-target="#modalView" data-id="<?= $row['idpesan'] ?>" data-nama="<?= $row['nama'] ?>" data-jumlahbayaran="<?= $row['jumlah_bayaran'] ?>" data-bank="<?= $row['bank'] ?>" data-norek="<?= $row['norek'] ?>" data-namarek="<?= $row['namarek'] ?>" data-gambar="<?= site_url() ?>uploads/tamu/bukti_pembayaran/<?= $row['bukti_pembayaran'] ?>"><i class="fas fa-edit"></i>Konfirmasi</a>
									</th>
								</tr>

						<?php
							}
						}
						?>
					</tbody>
				</table>
			</div>


			<!-- Modal -->
			<div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Lihat Data Kamar</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<p class="col-sm-4">Atas Nama</p>
								<p id="mnama" class="col-sm-8 text-info">test</p>
							</div>
							<div class="row">
								<p class="col-sm-4">Jumlah Bayaran</p>
								<p id="mjumlah_bayaran" class="col-sm-8 text-info">test</p>
							</div>
							<div class="row">
								<p class="col-sm-4">Bank</p>
								<p id="mbank" class="col-sm-8 text-info">test</p>
							</div>
							<div class="row">
								<p class="col-sm-4">norek</p>
								<p id="mnorek" class="col-sm-8 text-info">test</p>
							</div>
							<div class="row">
								<p class="col-sm-4">namarek</p>
								<p id="mnamarek" class="col-sm-8 text-info">test</p>
							</div>
							<div class="row">
								<p class="col-sm-4">gambar</p>
								<img width="100%" height="100%" id="mgambar" class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">

							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<form action="<?= site_url() ?>admin/konfirmasi_pembayaran" method="post">
								<input type="hidden" name="mid" id="mid">
								<button type="submit" class="btn btn-success">Validasi Pembayaran</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->
		</div>
</main>

<script>
	$(document).ready(function() {
		$('.open-modal').click(function() {
			$('.modal-footer #mid').val($(this).data('id'));
			$('.modal-body #mnama').text($(this).data('nama'));
			$('.modal-body #mjumlah_bayaran').text($(this).data('jumlahbayaran'));
			$('.modal-body #mbank').text($(this).data('bank'));
			$('.modal-body #mnorek').text($(this).data('norek'));
			$('.modal-body #mnamarek').text($(this).data('mnamarek'));
			$('.modal-body #mgambar').attr("src", $(this).data('gambar'));
		});

		$("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tbody tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
</script>
