<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/GlobalConfig.php';

?>
<!--Main Navigation-->
<header>
	<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
		<div class="container">
			<a class="navbar-brand" href="#">68-Sihooo - Sistem Hotel</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarColor01">
				<ul class="navbar-nav me-auto">
					<li class="nav-item">
						<a class="nav-link <?= current_url() == GlobalConfig::BASEPATH . 'uas/' ? 'active' : '' ?>" href="<?= site_url() ?>">Dashboard
							<span class="visually-hidden">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= str_contains(current_url(), '/uas/admin/fasilitas_list') ? 'active' : '' ?>" href="<?= site_url() ?>admin/fasilitas_list">Fasilitas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= str_contains(current_url(), '/uas/admin/kamar_list') ? 'active' : '' ?>" href="<?= site_url() ?>admin/kamar_list">Kamar</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= str_contains(current_url(), '/uas/admin/tamu_list') ? 'active' : '' ?>" href="<?= site_url() ?>admin/tamu_list">Tamu</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= str_contains(current_url(), '/uas/admin/pemesanan_list') ? 'active' : '' ?>" href="<?= site_url() ?>admin/pemesanan_list">Reservasi</a>
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
