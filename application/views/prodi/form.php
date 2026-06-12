<div class="container-fluid px-4">
    <h1 class="mt-4"><?= $title; ?></h1>
    <div class="card mb-4 col-md-6">
        <div class="card-header"><i class="fas fa-edit me-1"></i> Form Program Studi</div>
        <div class="card-body">
            <form action="<?= $action; ?>" method="post">

                <div class="mb-3">
                    <label for="prodi_id" class="form-label">ID Prodi</label>
                    <input type="number" name="prodi_id" id="prodi_id"
                        class="form-control <?= form_error('prodi_id') ? 'is-invalid' : ''; ?>"
                        value="<?= set_value('prodi_id', isset($prodi['prodi_id']) ? $prodi['prodi_id'] : ''); ?>"
                        <?= isset($prodi) ? 'readonly' : ''; ?>>
                    <?php if (form_error('prodi_id')): ?>
                        <div class="invalid-feedback"><?= form_error('prodi_id'); ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="fakultas_id" class="form-label">Fakultas</label>
                    <select name="fakultas_id" id="fakultas_id"
                        class="form-select <?= form_error('fakultas_id') ? 'is-invalid' : (isset($_POST['fakultas_id']) ? 'is-valid' : ''); ?>">
                        <option value="">-- Pilih Fakultas --</option>
                        <?php foreach ($fakultas as $f): ?>
                            <option value="<?= $f['fakultas_id']; ?>" <?= set_select('fakultas_id', $f['fakultas_id'], (isset($prodi['fakultas_id']) && $prodi['fakultas_id'] == $f['fakultas_id'])); ?>>
                                <?= $f['fakultas_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (form_error('fakultas_id')): ?>
                        <div class="invalid-feedback"><?= form_error('fakultas_id'); ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="prodi_name" class="form-label">Nama Program Studi</label>
                    <input type="text" name="prodi_name" id="prodi_name"
                        class="form-control <?= form_error('prodi_name') ? 'is-invalid' : (isset($_POST['prodi_name']) ? 'is-valid' : ''); ?>"
                        value="<?= set_value('prodi_name', isset($prodi['prodi_name']) ? $prodi['prodi_name'] : ''); ?>">
                    <?php if (form_error('prodi_name')): ?>
                        <div class="invalid-feedback"><?= form_error('prodi_name'); ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Strata</label>
                    <div>
                        <?php
                        $strata_options = ['D3', 'S1', 'S2'];
                        foreach ($strata_options as $s): ?>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input <?= form_error('prodi_strata') ? 'is-invalid' : (isset($_POST['prodi_strata']) ? 'is-valid' : ''); ?>"
                                    type="radio" name="prodi_strata" id="strata_<?= $s; ?>" value="<?= $s; ?>"
                                    <?= set_radio('prodi_strata', $s, (isset($prodi['prodi_strata']) && $prodi['prodi_strata'] === $s)); ?>>
                                <label class="form-check-label" for="strata_<?= $s; ?>"><?= $s; ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if (form_error('prodi_strata')): ?>
                        <div class="text-danger small mt-1"><?= form_error('prodi_strata'); ?></div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-success"><?= $button; ?></button>
                <a href="<?= site_url('prodi'); ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>