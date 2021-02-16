<?= $this->extend('layouts/main'); ?>

<?php session() ?>

<?= $this->section('content'); ?>
<div class="main-content-inner">

    <div class="col-lg-8 mt-5 ml-auto mr-auto">
        <div class="card">
            <div class="card-body">
                <?php if (session('danger')) { ?>
                    <div class="alert-dismiss">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session('danger'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="fa fa-times"></span>
                            </button>
                        </div>
                    </div>
                <?php } ?>
                <form id="profile_form" method="POST" action="<?= base_url('logbook/update'); ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id_logbook" value="<?= $logbook->id_logbook; ?>">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Judul</label>
                        <div class="col-sm-8">
                            <input type="text" name="judul" class="form-control <?= $validation->hasError('judul') ? 'is-invalid' : ''; ?>" id="judul" value="<?php if (old('judul')) {
                                                                                                                                                                    echo old('judul');
                                                                                                                                                                } else {
                                                                                                                                                                    echo $logbook->judul;
                                                                                                                                                                } ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('judul'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <textarea name="keterangan" class="form-control <?= $validation->hasError('keterangan') ? 'is-invalid' : ''; ?>" rows="5"><?php if (old('keterangan')) {
                                                                                                                                                            echo old('keterangan');
                                                                                                                                                        } else {
                                                                                                                                                            echo $logbook->keterangan;
                                                                                                                                                        } ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('keterangan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Waktu</label>
                        <div class="col-sm-8">
                            <input type="date" name="waktu" class="form-control <?= $validation->hasError('waktu') ? 'is-invalid' : ''; ?>" id="password" value="<?php if (old('waktu')) {
                                                                                                                                                                        echo old('waktu');
                                                                                                                                                                    } else {
                                                                                                                                                                        echo $logbook->waktu;
                                                                                                                                                                    } ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('waktu'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Nama Pasien</label>
                        <div class="col-sm-8">
                            <input type="text" name="pasien" class="form-control <?= $validation->hasError('pasien') ? 'is-invalid' : ''; ?>" id="nama_pasien" value="<?php if (old('pasien')) {
                                                                                                                                                                            echo old('pasien');
                                                                                                                                                                        } else {
                                                                                                                                                                            echo $logbook->pasien;
                                                                                                                                                                        } ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('pasien'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Usia Pasien</label>
                        <div class="col-sm-8">
                            <input type="number" name="usia" class="form-control <?= $validation->hasError('usia') ? 'is-invalid' : ''; ?>" id="usia" value="<?php if (old('usia')) {
                                                                                                                                                                    echo old('usia');
                                                                                                                                                                } else {
                                                                                                                                                                    echo $logbook->usia;
                                                                                                                                                                } ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('usia'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select id="jenis_kelamin" class="custom-select <?= $validation->hasError('jenis_kelamin') ? 'is-invalid' : ''; ?>" name="jenis_kelamin">
                                <option value="">pilih jenis kelamin</option>
                                <option value="l" <?= (old('jenis_kelamin') || $logbook->jenis_kelamin  == 'l') ? 'selected' : '' ?>>
                                    laki-laki
                                </option>
                                <option value="p" <?= ($logbook->jenis_kelamin || old('jenis_kelamin') == 'p') ? 'selected' : '' ?>>
                                    perempuan
                                </option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('jenis_kelamin'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Tindakan</label>
                        <div class="col-sm-8">
                            <input type="text" name="jenis_tindakan" class="form-control <?= $validation->hasError('jenis_tindakan') ? 'is-invalid' : ''; ?>" id="jenis_tindakan" value="<?php if (old('jenis_tindakan')) {
                                                                                                                                                                                                echo old('jenis_tindakan');
                                                                                                                                                                                            } else {
                                                                                                                                                                                                echo $logbook->jenis_tindakan;
                                                                                                                                                                                            } ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jenis_tindakan'); ?>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-dark mb-3 float-right" style="background: #370EFA;border-color: #370EFA;" value="Simpan">
                </form>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>

</script>
<?= $this->endSection(); ?>