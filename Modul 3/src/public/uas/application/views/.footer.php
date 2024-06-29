<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
	const buttonDeletes = document.querySelectorAll(".button-delete");
	const buttonConfirms = document.querySelectorAll(".button-confirm");

	buttonDeletes.forEach(element => element.addEventListener("click", buttonDeleteClick, false));
	buttonConfirms.forEach(element => element.addEventListener("click", buttonConfirmClick, false));

	function buttonDeleteClick(event) {
		event.preventDefault();

		Swal.fire({
			title: "Hapus?",
			text: "Data akan terhapus secara permanen!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, hapus!",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = event.target.href;

				return true;
			}
		});
	}

	function buttonConfirmClick(event) {
		event.preventDefault();

		Swal.fire({
			title: "Informasi!",
			text: "Apakah anda yakin ingin melanjutkan?",
			icon: "info",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = event.target.href;

				return true;
			}
		});
	}
</script>

<?php if ($this->session->flashdata('success')) : ?>
	<script>
		Swal.fire({
			title: "Berhasil!",
			text: "<?php echo $this->session->flashdata('success'); ?>",
			icon: "success"
		});
	</script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')) : ?>
	<script>
		Swal.fire({
			title: "Gagal!",
			text: "<?php echo $this->session->flashdata('error'); ?>",
			icon: "error"
		});
	</script>
<?php endif; ?>

</body>

</html>
