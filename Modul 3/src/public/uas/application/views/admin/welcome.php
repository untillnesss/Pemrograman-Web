<main class="pt-5 mx-lg-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Dashboard - Admin</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<div class="card mb-3">
					<div class="card-body d-flex">
						<h1 class="fs-1">
							<i class="bi bi-building"></i>
							<?= $kamar ?>
						</h1>
					</div>
					<div class="card-footer">Total Kamar</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card mb-3">
					<div class="card-body d-flex">
						<h1 class="fs-1">
							<i class="bi bi-people"></i> 
							<?= $tamu ?>
						</h1>
					</div>
					<div class="card-footer">Total Tamu</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card mb-3">
					<div class="card-body d-flex">
						<h1 class="fs-1">
							<i class="bi bi-gift"></i>
							<?= $pesanan ?>
						</h1>
					</div>
					<div class="card-footer">Total Pesanan</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card mb-3">
					<div class="card-body d-flex">
						<h1 class="fs-1">
							<i class="bi bi-cash"></i>
							<?= rupiah($sumPesanan) ?>
						</h1>
					</div>
					<div class="card-footer">Total Pemasukan</div>
				</div>
			</div>
		</div>
	</div>
</main>
