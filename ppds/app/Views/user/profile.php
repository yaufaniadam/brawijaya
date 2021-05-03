<?= $this->extend('layouts/main'); ?>

<?php session() ?>

<?= $this->section('content'); ?>
<style>
    .save,
    .cancel {
        display: none;
    }
</style>
<div class="main-content-inner">

    <div class="col-lg-8 mt-5 ml-auto mr-auto">
        <div class="card">
            <div class="card-body">
                <form id="profile_form" action="<?= base_url('user/editProfile'); ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row">

                        <div class="col-5">
                            <div class="ml-auto mr-auto" style="background-image: url(<?= $data_user->photo == '' ? base_url('images/profile/dummy.png') : base_url('users_profile_pic/' . $data_user->photo); ?>);width:170px;height:170px;background-position:center center;background-size:100%;border-radius: 100%;background-repeat: no-repeat;">

                                <label class="foto_profil" for="photo_profile" style="width:170px;height:170px;border-radius: 100%;background-position:center center; border:1px solid #ddd;"></label>
                                <input type="hidden" name="old_photo" value="<?= $data_user->photo; ?>">

                                <input style="display:none;" disabled type="file" name="photo_profile" id="photo_profile" value="<?= $data_user->photo; ?>">
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
                            <div class="d-flex justify-content-center">
                                <?php if ($data_user->aktif == 0) {
                                ?>
                                    <a class="btn btn-info float-left mb-3 mx-1" href="<?= base_url('admin/user/aktifkan/' . $data_user->id_ppds); ?>">Aktifkan</a>
                                <?php } ?>

                                <a class="edit btn btn-dark mb-3 mx-1 text-white"><i class="fa fa-pencil"></i> Edit Profil</a>
                                <a class="cancel btn btn-danger mb-3 mx-1 text-white"><i class="fa fa-times"></i> Batal</a>

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
                                <label for="inputHorizontalPrimary" class="col-form-label">Stase</label>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div id="inputFormRow">
                                            <div class="input-group mb-3">
                                                <select class="form-control mr-1" name="stase[]" id="exampleFormControlSelect1">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <button id="removeRow" type="button" class="btn btn-sm mr-1">-</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="newRow"></div>
                                        <button id="addRow" type="button" class="btn btn-block">tambah stase</button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">Password</label>
                                <input disabled type='password' nama='password' class='form-control form-control-primary' id='password' placeholder="********">
                                <input type="hidden" name="old_password" value="<?= $data_user->password; ?>">
                            </div>
                            <hr>

                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">Nama Lengkap(beserta gelar)</label>
                                <input disabled type='text' name='nama_lengkap' class='form-control form-control-primary' id='nama_lengkap' value='<?= $data_user->nama_lengkap; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->nama_lengkap; ?>">
                            </div>

                            <div class="form-group has-primary">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                    <select disabled class="form-control" required name="jenis_kelamin">
                                        <option value="l" <?= $data_user->jenis_kelamin == 'l' ? 'selected' : ''; ?>>laki-laki</option>
                                        <option value="p" <?= $data_user->jenis_kelamin == 'p' ? 'selected' : ''; ?>>perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">Alamat Asal</label>
                                <textarea disabled required class='form-control form-control-primary <?= $validation->hasError('alamat_asal') ? "is-invalid" : ""; ?>' name="alamat_asal" id="alamat_asal" cols="10" rows="2"><?= $data_user->alamat_asal; ?></textarea>
                                <input type="hidden" name="old_nama" value="<?= $data_user->alamat_asal; ?>">
                            </div>

                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">Alamat Domisili</label>
                                <textarea disabled required class='form-control form-control-primary <?= $validation->hasError('alamat_domisili') ? "is-invalid" : ""; ?>' name="alamat_domisili" id="alamat_domisili" cols="10" rows="2"><?= $data_user->alamat_domisili; ?></textarea>
                                <input type="hidden" name="old_nama" value="<?= $data_user->alamat_domisili; ?>">
                            </div>

                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">No. Telp</label>
                                <input disabled required type='text' name='no_telp' class='form-control form-control-primary <?= $validation->hasError('no_telp') ? "is-invalid" : ""; ?>' id='no_telp' value='<?= $data_user->no_telp; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->no_telp; ?>">
                            </div>

                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">No. Telp Darurat/Keluarga</label>
                                <input disabled required type='text' name='no_telp_drt' class='form-control form-control-primary <?= $validation->hasError('old_nama') ? "is-invalid" : ""; ?>' id='no_telp_drt' value='<?= $data_user->no_telp_drt; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->no_telp_drt; ?>">
                            </div>

                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">NIM</label>
                                <input disabled required type='text' name='nim' class='form-control form-control-primary <?= $validation->hasError('nim') ? "is-invalid" : ""; ?>' id='nim' value='<?= $data_user->nim; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->nim; ?>">
                            </div>

                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">Status</label>
                                <input disabled required type='text' name='status' class='form-control form-control-primary <?= $validation->hasError('status') ? "is-invalid" : ""; ?>' id='status' value='<?= $data_user->status; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->status; ?>">
                            </div>

                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">Pembiayaan</label>
                                <input disabled type='text' name='pembiayaan' class='form-control form-control-primary <?= $validation->hasError('pembiayaan') ? "is-invalid" : ""; ?>' id='pembiayaan' value='<?= $data_user->pembiayaan; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->pembiayaan; ?>">
                            </div>

                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">No. SIP</label>
                                <input disabled type='text' name='no_sip' class='form-control form-control-primary' id='no_sip' value='<?= $data_user->no_sip; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->no_sip; ?>">
                            </div>

                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">No. STR</label>
                                <input disabled required type='text' name='no_str' class='form-control form-control-primary <?= $validation->hasError('no_str') ? "is-invalid" : ""; ?>' id='no_str' value='<?= $data_user->no_str; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->no_str; ?>">
                            </div>

                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">No. BPJS</label>
                                <input disabled required type='text' name='no_bpjs' class='form-control form-control-primary <?= $validation->hasError('no_bpjs') ? "is-invalid" : ""; ?>' id='no_bpjs' value='<?= $data_user->no_bpjs; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->no_str; ?>">
                            </div>

                            <div class="form-group has-primary">
                                <label for="inputHorizontalPrimary" class="col-form-label">No. Rekening</label>
                                <input disabled required type='text' name='no_rekening' class='form-control form-control-primary <?= $validation->hasError('no_rekening') ? "is-invalid" : ""; ?>' id='no_rekening' value='<?= $data_user->no_rekening; ?>'>
                                <input type="hidden" name="old_nama" value="<?= $data_user->no_rekening; ?>">
                            </div>

                            <div class="form-group has-primary">
                                <button class="save btn btn-success mb-3 mx-1 text-white"><i class="fa fa-save"></i> Simpan</button>
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
    $('#menu_users').addClass('active');
    $('#menu_users ul.collapse').addClass('in');

    $('.edit').click(function() {
        $(this).hide();
        $('.save, .cancel').show();
        $('input:disabled, select:disabled, textarea:disabled').each(function() {
            $(this).removeAttr('disabled');
        });
        $('.foto_profil').css('cursor', 'pointer');
        $('.foto_profil').css('background', 'rgba(0,0,0,0.5) url(<?= base_url('images/icon/edit-foto.png'); ?>) center center no-repeat');

    });
    $('.cancel').click(function() {
        $(this).siblings('.edit').show();
        $('.save').hide();
        $(this).hide();

        $('#profile_form input[type=text], #profile_form input[type=file], #profile_form input[type=password], #profile_form input[type=email], #profile_form select, #profile_form textarea').each(function() {
            $(this).attr('disabled', 'true');
        });
        $('.foto_profil').css('cursor', 'default');
        $('.foto_profil').css('background', 'none');
    });

    $('#photo_profile').change(function() {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onloadend = function() {
            $('.foto_profil').css('background-image', 'url("' + reader.result + '")');
            $('.foto_profil').css('background-size', '100%');
        }
        if (file) {
            reader.readAsDataURL(file);
        } else {}
    });


    <?php if (session('validation')) { ?>
        $('#email_static').replaceWith("<input type='email' name='email' class='form-control form-control-primary <?= ($validation->hasError('email') ? 'is-invalid' : ''); ?>' id='email' value='<?= old('email'); ?>'> ");
        $("<div id='error_email' class='valid-feedback'><?= $validation->getError('email'); ?> </div>").insertAfter();
        $('#nama_lengkap_static').replaceWith("<input type='text' name='nama' class='form-control form-control-primary' id='nama_lengkap' value='<?= $data_user->nama_lengkap; ?>'>");
        $('#password_static').replaceWith("<input type='password' nama='password' class='form-control form-control-primary' id='password'>");
        $('#photo_profile').prop('disabled', false);
    <?php } ?>


    // add row
    $("#addRow").click(function() {
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<select class="form-control mr-1" name="stase[]" id="exampleFormControlSelect1">';
        html += '<option value="1">1</option>';
        html += '<option value="2">2</option>';
        html += '<option value="3">3</option>';
        html += '</select>';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-sm mr-1">-</button>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function() {
        $(this).closest('#inputFormRow').remove();
    });
</script>

<!-- <select class="form-control mr-1" name="stase" id="exampleFormControlSelect1">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
</select> -->
<?= $this->endSection(); ?>