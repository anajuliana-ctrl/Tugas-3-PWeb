<div class="card shadow border-0 mb-4">
	<div class="card-header bg-secondary text-white d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
		<div>
			<h5 class="mb-0 fw-bold">
				<?php echo isset($button) && $button === 'Update' ? 'Ubah Fakultas' : 'Tambah Fakultas'; ?>
			</h5>
		</div>

		<a class="btn btn-light" href="<?php echo base_url('fakultas') ?>">
			Kembali
		</a>
	</div>

	<div class="card-body">
		<form action="<?php echo $action; ?>" method="post">

			<div class="mb-3">
				<label class="form-label">ID Fakultas</label>
				<input
					type="number"
					name="fakultas_id"
					class="form-control"
					value="<?php echo isset($fakultas['fakultas_id']) ? $fakultas['fakultas_id'] : ''; ?>"
					placeholder="Masukkan ID Fakultas">
			</div>

			<div class="mb-3">
				<label class="form-label">Nama Fakultas</label>
				<input
					type="text"
					name="fakultas_name"
					class="form-control"
					value="<?php echo isset($fakultas['fakultas_name']) ? $fakultas['fakultas_name'] : ''; ?>"
					placeholder="Masukkan Nama Fakultas">
			</div>

			<div class="d-flex gap-2">
				<button type="submit" class="btn btn-primary">
					<?php echo isset($button) ? $button : 'Simpan'; ?>
				</button>

				<a href="<?php echo base_url('fakultas') ?>" class="btn btn-secondary">
					Batal
				</a>
			</div>

		</form>
	</div>
</div>