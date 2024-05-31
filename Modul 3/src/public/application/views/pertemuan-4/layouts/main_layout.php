<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data barang</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link href="https://bootswatch.com/5/zephyr/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>


<body>
	<nav class="navbar navbar-expand-lg bg-primary mb-4" data-bs-theme="dark">
		<div class="container">
			<a class="navbar-brand" href="/">PRAKTISI MENGAJAR 4 - SAID</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarColor01">
				<ul class="navbar-nav me-auto">
					<li class="nav-item">
						<a class="nav-link <?= str_contains(current_url(), '/pertemuan4/beranda') ? 'active' : '' ?>" href="<?= base_url('pertemuan4/beranda')?>">Beranda</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= str_contains(current_url(), '/pertemuan4/barang') ? 'active' : '' ?>" href="<?= base_url('pertemuan4/barang')?>">Barang</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= str_contains(current_url(), '/pertemuan4/tentang') ? 'active' : '' ?>" href="<?= base_url('pertemuan4/tentang')?>">Tentang</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container mb-5">
		<?= $content  ?? ''?>
	</div>

	<div class="mb-5"></div>

	<div class="position-fixed bottom-0 bg-primary w-100">
		<div class="container py-3">
			<div class="text-white">Copyright &copy; Said - 1412 22 0068</div>
		</div>
	</div>

</body>

</html>
