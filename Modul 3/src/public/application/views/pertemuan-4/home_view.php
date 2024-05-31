<div class="row">
	<div class="col-4">
		<div class="card mb-3">
			<div class="card-body d-flex">
				<h1 class="fs-1">
					<i class="bi bi-box"></i>
					40
				</h1>
			</div>
			<div class="card-footer">Total Barang</div>
		</div>
	</div>
	<div class="col-4">
		<div class="card mb-3">
			<div class="card-body d-flex">
				<h1 class="fs-1">
					<i class="bi bi-people"></i> 33
				</h1>
			</div>
			<div class="card-footer">Total Pelanggan</div>
		</div>
	</div>
	<div class="col-4">
		<div class="card mb-3">
			<div class="card-body d-flex">
				<h1 class="fs-1">
					<i class="bi bi-gift"></i>
					26
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
					Rp 700.000.000
				</h1>
			</div>
			<div class="card-footer">Total Pemasukan</div>
		</div>
	</div>
	<div class="col-12">
		<div class="card mb-5">
			<canvas id="myChart"></canvas>
		</div>
	</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
	const ctx = document.getElementById('myChart');

	new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
			datasets: [{
				label: '# of Votes',
				data: [12, 19, 3, 5, 2, 3],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		}
	});
</script>
