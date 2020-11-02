<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $page_header; ?></h1>
    </div>

    <?php if (session('warning')) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session('warning'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

    <div class="card shadow w-75 ml-auto mr-auto">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Ilmiah</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('ilmiah/post'); ?>" method="POST">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Judul Ilmiah</label>
                    <div class="col-sm-9">
                        <input type="text" name="judul_ilmiah" class="form-control <?= ($validation->hasError('username') ? 'is-invalid' : ''); ?>" value="<?= old('username'); ?>" placeholder="Judul Ilmiah">
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                        <textarea name="deskripsi" class="form-control <?= ($validation->hasError('email') ? 'is-invalid' : ''); ?>" id="" cols="30" rows="10"></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label <?= ($validation->hasError('role') ? 'is-invalid' : ''); ?>">Kategori</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="role" id="role">
                            <option>Pilih Kategori</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('role'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label <?= ($validation->hasError('role') ? 'is-invalid' : ''); ?>">Divisi</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="role" id="role">
                            <option>Pilih Divisi</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('role'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label <?= ($validation->hasError('role') ? 'is-invalid' : ''); ?>">Pembimbing</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="role" id="role">
                            <option>Pilih Pembimbing</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('role'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label <?= ($validation->hasError('role') ? 'is-invalid' : ''); ?>">Tanggal Maju</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control <?= ($validation->hasError('username') ? 'is-invalid' : ''); ?>" name="tgl_maju" id="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label <?= ($validation->hasError('role') ? 'is-invalid' : ''); ?>">Dokumen Ilmiah</label>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" data-browse="Cari" for="customFile">Pilih file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>
    $('#add-user').addClass('active');
</script>
<?= $this->endSection(); ?>