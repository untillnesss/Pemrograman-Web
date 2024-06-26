<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
	const buttonDeletes = document.querySelector(".button-delete");

	buttonDeletes.addEventListener("click", buttonDeleteClick, false);

	function buttonDeleteClick(event) {
		event.preventDefault();

		Swal.fire({
			title: "Hapus Barang?",
			text: "Data barang akan terhapus secara permanen!",
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
