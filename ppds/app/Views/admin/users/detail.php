<?= $this->extend('layouts/main'); ?>

<?php session() ?>

<?= $this->section('content'); ?>
<div class="main-content-inner">

    <div class="col-lg-8 mt-5 ml-auto mr-auto">
        <div class="card">
            <div class="card-body">
                <form id="profile_form" action="<?= base_url('user/editProfile'); ?>" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row">

                        <div class="col-5">
                            <div style="background-image: url(<?= $data_user->photo == '' ? base_url('images/profile/dummy.png') : $data_user->photo; ?>);width:170px;height:170px;background-position:center center;background-size:100%;border-radius: 100%;background-repeat: no-repeat;">
                                <input disabled type="file" name="photo_profile" id="photo_profile" style="width:20px;width:20px;display:none;bottom: 0;" value="<?= $data_user->photo; ?>">
                                <label for="photo_profile" style="width:170px;height:170px;border-radius: 100%;background-position:center center;background-size:50%;background-repeat: no-repeat;background-color: #9a9999;opacity: 70%;"></label>
                                <input type="hidden" name="old_photo" value="<?= $data_user->photo; ?>">
                            </div>
                            <div class="text-center mt-1" style="width:170px;">
                                <h5><?= $data_user->username; ?></h5>
                                <br>
                                <?php if ($validation->hasError('photo')) { ?>
                                    <span id="error_photo" class="text-danger">
                                        <?= $validation->getError('photo'); ?>
                                    </span>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">Email</label>
                                <p id="email_static"><?= $data_user->email; ?></p>
                                <div id='error_email' class='invalid-feedback'>
                                    <?= $validation->getError('email'); ?>
                                </div>
                                <input type="hidden" name="old_email" value="<?= $data_user->email; ?>">
                            </div>
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">Nama Lengkap</label>
                                <p id="nama_lengkap_static"><?= $data_user->nama_lengkap; ?></p>
                                <input type="hidden" name="old_nama" value="<?= $data_user->nama_lengkap; ?>">
                            </div>
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">Jenis Kelamin</label>
                                <p id="nama_lengkap_static"><?= $data_user->nama_lengkap; ?></p>
                                <input type="hidden" name="old_nama" value="<?= $data_user->jenis_kelamin; ?>">
                            </div>
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">Alamat Asal</label>
                                <p id="nama_lengkap_static"><?= $data_user->nama_lengkap; ?></p>
                                <input type="hidden" name="old_nama" value="<?= $data_user->alamat_asal; ?>">
                            </div>
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">Alamat Domisili</label>
                                <p id="nama_lengkap_static"><?= $data_user->nama_lengkap; ?></p>
                                <input type="hidden" name="old_nama" value="<?= $data_user->alamat_domisili; ?>">
                            </div>
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">No. Telp</label>
                                <p id="nama_lengkap_static"><?= $data_user->nama_lengkap; ?></p>
                                <input type="hidden" name="old_nama" value="<?= $data_user->no_telp; ?>">
                            </div>
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">No. Telp Darurat/Keluarga</label>
                                <p id="nama_lengkap_static"><?= $data_user->nama_lengkap; ?></p>
                                <input type="hidden" name="old_nama" value="<?= $data_user->no_telp_drt; ?>">
                            </div>
                        </div>

                        <div class="col-12">
                            <?php if ($data_user->aktif == 0) { ?>
                                <a class="btn btn-dark float-right" style="background: #370EFA;border-color: #370EFA;" href="<?= base_url('admin/user/aktifkan/' . $data_user->id_ppds); ?>">Aktifkan</a>
                            <?php } ?>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>

    $('#edit_btn').click(function() {
        $('#email_static').replaceWith("<input type='email' name='email' class='form-control form-control-primary' id='email' value='<?= $data_user->email; ?>'>")
        $('#nama_lengkap_static').replaceWith("<input type='text' name='nama' class='form-control form-control-primary' id='nama_lengkap' value='<?= $data_user->nama_lengkap; ?>'>")
        $('#password_static').replaceWith("<input type='password' nama='password' class='form-control form-control-primary' id='password'>")
        $('#photo_profile').prop('disabled', false)
    });

    <?php if (session('validation')) { ?>
        $('#email_static').replaceWith("<input type='email' name='email' class='form-control form-control-primary <?= ($validation->hasError('email') ? 'is-invalid' : ''); ?>' id='email' value='<?= old('email'); ?>'> ")
        $("<div id='error_email' class='valid-feedback'><?= $validation->getError('email'); ?> </div>").insertAfter()
        $('#nama_lengkap_static').replaceWith("<input type='text' name='nama' class='form-control form-control-primary' id='nama_lengkap' value='<?= $data_user->nama_lengkap; ?>'>")
        $('#password_static').replaceWith("<input type='password' nama='password' class='form-control form-control-primary' id='password'>")
        $('#photo_profile').prop('disabled', false)
    <?php } ?>
</script>
<?= $this->endSection(); ?>