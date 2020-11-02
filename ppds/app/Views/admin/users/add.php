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
                <form id="profile_form" method="POST" action="<?= base_url('admin/users/post'); ?>" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" name="username" class="form-control <?= $validation->hasError('username') ? "is-invalid" : ""; ?>" id="username" value="<?= old('username'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" class="form-control <?= $validation->hasError('email') ? "is-invalid" : ""; ?>" id="email" value="<?= old('email'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" class="form-control <?= $validation->hasError('password') ? "is-invalid" : ""; ?>" id="password" value="<?= old('password'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Role</label>
                        <div class="col-sm-8">
                            <select class="custom-select <?= $validation->hasError('role') ? "is-invalid" : ""; ?>" name="role" id="role">
                                <option value="">Pilih Role</option>
                                <?php foreach ($role as $role) { ?>
                                    <option <?= $role['id'] == old('role') ? "selected" : ""; ?> value="<?= $role['id']; ?>"><?= $role['role']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('role'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" style="display: none;" id="spvr">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Supervisor</label>
                        <div class="col-sm-8">
                            <select class="custom-select" name="spv" id="spv">
                                <option value="">Pilih Supervisor</option>
                                <?php foreach ($spv as $spv) { ?>
                                    <option <?= $spv['id'] == old('spv') ? "selected" : ""; ?> value="<?= $spv['id']; ?>"><?= $spv['nama_lengkap']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('id_kategori'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" style="display: none;" id="stase">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Stase</label>
                        <div class="col-sm-8">
                            <select class="custom-select" name="stase" id="spv">
                                <option value="">Pilih Stase</option>
                                <?php foreach ($stase as $stase) { ?>
                                    <option <?= $stase['id'] == old('stase') ? "selected" : ""; ?> value="<?= $stase['id']; ?>"><?= $stase['stase']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('id_kategori'); ?>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-dark mb-3 float-right" style="background: #370EFA;border-color: #370EFA;" value="Tambah">
                </form>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>
    // $('#tugas').addClass('active');
    // $('#tugas_divisi').addClass('active');
    // $('#semua_tugas').addClass('active');
    $("#role").change(function() {

        if ($(this).val() == "4") {
            $('#spvr').show()
            $('#stase').hide()
        } else if ($(this).val() == "3") {
            $('#spvr').hide()
            $('#stase').show()
        } else {
            $('#spvr').hide()
            $('#stase').hide()
        }
    });
</script>
<?= $this->endSection(); ?>