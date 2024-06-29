<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/GlobalConfig.php';

?>
<!--Main Navigation-->
<header>
	<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
		<div class="container">
			<a class="navbar-brand" href="#">Sihooo - Sistem Hotel</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarColor01">
				<ul class="navbar-nav me-auto">
					<li class="nav-item">
						<a class="nav-link <?= current_url() == GlobalConfig::BASEPATH . 'uas/tamu_kamar' ? 'active' : '' ?>" href="<?= site_url() ?>tamu_kamar">Dashboard
							<span class="visually-hidden">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= str_contains(current_url(), '/uas/tamu_kamar/riwayat_pemesanan') ? 'active' : '' ?>" href="<?= site_url() ?>tamu_kamar/riwayat_pemesanan">Data Reservasi</a>
					</li>
				</ul>
			</div>

			<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
				<button type="button" class="btn btn-danger"><?= $this->session->userdata('username') ?></button>
				<div class="btn-group" role="group">
					<button id="btnGroupDrop4" type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
					<div class="dropdown-menu" aria-labelledby="btnGroupDrop4">
						<a class="dropdown-item" href="<?php echo base_url() ?>login/logout">Logout</a>
					</div>
				</div>
			</div>
		</div>
	</nav>
</header>
<!--Main Navigation-->
