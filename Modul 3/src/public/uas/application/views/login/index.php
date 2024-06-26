<div style="height: 100vh;" class="d-flex align-items-center">
	<div class="container d-flex justify-content-center align-items-center">
		<div class="card p-5" style="width: 50%;">
			<div class="row">
				<div class="col-sm">
					<!-- Default form login -->
					<form class="" method="post" action="<?= site_url() ?>login/login_validation">

						<h1 class="fs-1">
							<i class="bi bi-house-heart"></i>
						</h1>
						<p class="h2 mb-2">Login Sihooo</p>
						<p class="h4 mb-4">Sistem Hoootel</p>

						<!-- Email -->
						<div>
							<label for="username" class="form-label">Username</label>
							<input type="text" name="username" id="username" class="form-control mb-4" placeholder="Masukkan username">
						</div>

						<!-- Password -->
						<div>
							<label for="password" class="form-label">Password</label>
							<input type="password" name="password" id="password" class="form-control mb-4" placeholder="Masukkan password">
						</div>

						<!-- Sign in button -->
						<button class="btn btn-primary" type="submit">Login</button>

					</form>
					<!-- Default form login -->
				</div>
			</div>
		</div>
	</div>
</div>
