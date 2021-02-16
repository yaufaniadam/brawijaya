<?= $this->extend('layouts/main'); ?>

<?php session() ?>

<?= $this->section('content'); ?>
<div class="main-content-inner">

    <div class="col-lg-8 mt-5 ml-auto mr-auto">
        <div class="card">
            <div class="card-body">
                <form id="profile_form" action="<?= base_url('user/editProfile'); ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row">

                        <div class="col-5">
                            <div class="ml-auto mr-auto" style="background-image: url(<?= $data_user->photo == '' ? base_url('images/profile/dummy.png') : base_url('users_profile_pic/' . $data_user->photo); ?>);width:170px;height:170px;background-position:center center;background-size:100%;border-radius: 100%;background-repeat: no-repeat;">
                                <input disabled type="file" name="photo_profile" id="photo_profile" style="width:20px;width:20px;display:none;bottom: 0;" value="<?= $data_user->photo; ?>">
                                <label for="photo_profile" style="width:170px;height:170px;border-radius: 100%;background-image: url(<?= base_url('images/icon/pic_add.png'); ?>);background-position:center center;background-size:50%;background-repeat: no-repeat;background-color: #9a9999;opacity: 70%;"></label>
                                <input type="hidden" name="old_photo" value="<?= $data_user->photo; ?>">
                            </div>
                            <div class="text-center mt-1">
                                <h5><?= $data_user->username; ?></h5>
                                <br>
                                <?php if ($validation->hasError('photo')) { ?>
                                    <span id="error_photo" class="text-danger">
                                        <?= $validation->getError('photo'); ?>
                                    </span>
                                <?php } ?>
                            </div>
                            <div class="row">
                                <?php if ($data_user->aktif == 0) { ?>
                                    <a class="btn btn-dark float-left mb-3 mr-1" style="background: #370EFA;border-color: #370EFA;" href="<?= base_url('admin/user/aktifkan/' . $data_user->id_ppds); ?>">Aktifkan</a>
                                <?php } ?>
                                <input type="submit" id="submit" disabled class="btn btn-dark mb-3 mr-1 float-right" style="background: #370EFA;border-color: #370EFA;" value="Simpan">
                                <button type="button" id="edit_btn" class="btn btn-dark mb-3 float-right mr-1">Edit</button>
                            </div>
                        </div>
                        <div class="col-7">
                            <input type="hidden" name="id_ppds" value="<?= $data_user->id_ppds; ?>">

                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">Email</label>
                                <input disabled type='email' name='email' class='form-control form-control-primary' id='email' value='<?= $data_user->email; ?>'>
                                <div id='error_email' class='invalid-feedback'>
                                    <?= $validation->getError('email'); ?>
                                </div>
                                <input type="hidden" name="old_email" value="<?= $data_user->email; ?>">
                            </div>
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">Password</label>
                                <input disabled type='password' nama='password' class='form-control form-control-primary' id='password' placeholder="********">
                                <input type="hidden" name="old_password" value="<?= $data_user->password; ?>">
                            </div>
                            <hr>
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">Nama Lengkap</label>
                                <input disabled type='text' name='nama_lengkap' class='form-control form-control-primary' id='nama_lengkap' value='<?= $data_user->nama_lengkap; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->nama_lengkap; ?>">
                            </div>
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">Alamat Asal</label>
                                <textarea disabled class='form-control form-control-primary' name="alamat_asal" id="alamat_asal" cols="10" rows="2"><?= $data_user->alamat_asal; ?></textarea>
                                <input type="hidden" name="old_nama" value="<?= $data_user->alamat_asal; ?>">
                            </div>
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">Alamat Domisili</label>
                                <textarea disabled class='form-control form-control-primary' name="alamat_domisili" id="alamat_domisili" cols="10" rows="2"><?= $data_user->alamat_domisili; ?></textarea>
                                <input type="hidden" name="old_nama" value="<?= $data_user->alamat_domisili; ?>">
                            </div>
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">No. Telp</label>
                                <input disabled type='text' name='no_telp' class='form-control form-control-primary' id='no_telp' value='<?= $data_user->no_telp; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->no_telp; ?>">
                            </div>
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">No. Telp Darurat/Keluarga</label>
                                <input disabled type='text' name='no_telp_drt' class='form-control form-control-primary' id='no_telp_drt' value='<?= $data_user->no_telp_drt; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->no_telp_drt; ?>">
                            </div>
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">NIM</label>
                                <input disabled type='text' name='nim' class='form-control form-control-primary' id='nim' value='<?= $data_user->nim; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->nim; ?>">
                            </div>
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">Status</label>
                                <input disabled type='text' name='status' class='form-control form-control-primary' id='status' value='<?= $data_user->status; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->status; ?>">
                            </div>
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">Pembiayaan</label>
                                <input disabled type='text' name='pembiayaan' class='form-control form-control-primary' id='pembiayaan' value='<?= $data_user->pembiayaan; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->pembiayaan; ?>">
                            </div>
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">No. SIP</label>
                                <input disabled type='text' name='no_sip' class='form-control form-control-primary' id='no_sip' value='<?= $data_user->no_sip; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->no_sip; ?>">
                            </div>
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">No. STR</label>
                                <input disabled type='text' name='no_str' class='form-control form-control-primary' id='no_str' value='<?= $data_user->no_str; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->no_str; ?>">
                            </div>
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">No. BPJS</label>
                                <input disabled type='text' name='no_bpjs' class='form-control form-control-primary' id='no_bpjs' value='<?= $data_user->no_bpjs; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->no_str; ?>">
                            </div>
                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">No. Rekening</label>
                                <input disabled type='text' name='no_rekening' class='form-control form-control-primary' id='no_rekening' value='<?= $data_user->no_rekening; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->no_str; ?>">
                            </div>
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
    // window.onload = function() {
    //     if (window.jQuery) {
    //         // jQuery is loaded  
    //         alert("Yeah!");
    //     } else {
    //         // jQuery is not loaded
    //         alert("Doesn't Work");
    //     }
    // }

    $('#edit_btn').click(function() {
        $('input:disabled, select:disabled').each(function() {
            $(this).removeAttr('disabled');
        });
        $('#alamat_asal').prop('disabled', false)
        $('#alamat_domisili').prop('disabled', false)
        $(this).html('batal');
        $(this).attr("id", "batal_btn");
    });

    $('#batal_btn').click(function() {

        $("#target :input").prop("disabled", true);
        $(this).html('edit');
        $(this).attr("id", "edit_btn");
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