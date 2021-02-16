<?= $this->extend('layouts/main'); ?>

<?php session() ?>

<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/jquery.datetimepicker.min.css'); ?>">

<div class="main-content-inner">

    <div class="col-lg-8 mt-5 ml-auto mr-auto">
        <div class="card">
            <div class="card-body">
                <form id="profile_form" method="POST" action="<?= base_url('tugas/post'); ?>" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Judul Tugas</label>
                        <div class="col-sm-8">
                            <input required type="text" name="judul" class="form-control <?= $validation->hasError('judul') ? "is-invalid" : ""; ?>" id="judul" value="<?= old('judul'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('judul'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <textarea required name="deskripsi" class="form-control <?= $validation->hasError('deskripsi') ? "is-invalid" : ""; ?>" rows="5"><?= old('deskripsi'); ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('deskripsi'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Kategori Tugas</label>
                        <div class="col-sm-8">
                            <select required id="kategori" class="custom-select <?= $validation->hasError('id_kategori') ? "is-invalid" : ""; ?>" name="id_kategori">
                                <option value="">Pilih kategori</option>
                                <?php foreach ($kategori as $kategori) { ?>
                                    <option <?= $kategori['id'] == old('id_kategori') ? "selected" : ""; ?> value="<?= $kategori['id']; ?>"><?= $kategori['kategori']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('id_kategori'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">File Tugas</label>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input required type="file" name="file" class="file-tugas custom-file-input form-control-sm <?= $validation->hasError('file') ? "is-invalid" : ""; ?>" id="customFile" value="<?= old('file'); ?>" onchange="onFileUpload()">
                                <label class="custom-file-label" for="customFile" id="nama-file-baru">tidak ada file dipilih</label>
                            </div>
                            <?php if ($validation->hasError('file')) { ?>
                                <small id="error_file" class="text-danger">
                                    <?= $validation->getError('file'); ?>
                                </small>
                            <?php } ?>
                            <small>
                                * format file yang didukung : pdf,doc,docx,ppt,pptx
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">File Presentasi</label>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input required type="file" name="file_pre" class="file-pre custom-file-input form-control-sm <?= $validation->hasError('file_presentasi') ? "is-invalid" : ""; ?>" id="customFile" value="<?= old('file'); ?>" onchange="onFilePreUpload()">
                                <label class="custom-file-label" for="customFile" id="nama-file-pre-baru">tidak ada file dipilih</label>
                            </div>
                            <?php if ($validation->hasError('file_presentasi')) { ?>
                                <small id="error_file" class="text-danger">
                                    <?= $validation->getError('file_presentasi'); ?>
                                </small>
                            <?php } ?>
                            <small>
                                * format file yang didukung : ppt,pptx
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Tanggal Sidang</label>
                        <div class="col-sm-8">
                            <input required id="datetimepicker" name="jadwal_sidang" class="form-control <?= $validation->hasError('jadwal_sidang') ? "is-invalid" : ""; ?>" type="text" value="<?= old('jadwal_sidang'); ?>">
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jadwal_sidang'); ?>
                        </div>
                    </div>

                    <div id="list-penguji" class="form-group row">
                        <label class="col-sm-4 col-form-label" for="pembimbing_1">Pembimbing Satu</label>
                        <div class="col-sm-8">
                            <select required name="pembimbing_1" class="form-control" id="pembimbing_1" <?= $validation->hasError('pembimbing_1') ? "is-invalid" : ""; ?>>
                                <option value="">Pilih pembimbing satu</option>
                                <?php foreach ($penguji as $penguji) { ?>
                                    <option value="<?= $penguji['id']; ?>"><?= $penguji['nama_lengkap']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('pembimbing_1'); ?>
                            </div>
                        </div>
                    </div>

                    <div id="list-penguji" class="form-group row">
                        <label class="col-sm-4 col-form-label" for="pembimbing_2">Pembimbing Dua</label>
                        <div class="col-sm-8">
                            <select required name="pembimbing_2" class="pembimbing_2 form-control" id="pembimbing_2" <?= $validation->hasError('pembimbing_2') ? "is-invalid" : ""; ?>>
                                <option value="0">Pilih pembimbing dua</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('pembimbing_2'); ?>
                            </div>
                        </div>
                    </div>

                    <?php if ($page_header == 'Tugas Besar') { ?>
                        <div id="list-penguji" class="form-group row">
                            <label class="col-sm-4 col-form-label" for="penguji_1">Penguji Satu</label>
                            <div class="col-sm-8">
                                <select required name="penguji_1" class="form-control" id="penguji_1" <?= $validation->hasError('penguji_1') ? "is-invalid" : ""; ?>>
                                    <option value="">Pilih Penguji Satu</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('penguji_1'); ?>
                                </div>
                            </div>
                        </div>

                        <div id="list-penguji" class="form-group row">
                            <label class="col-sm-4 col-form-label" for="penguji_2">Penguji Dua</label>
                            <div class="col-sm-8">
                                <select required name="penguji_2" class="form-control" id="penguji_2" <?= $validation->hasError('penguji_2') ? "is-invalid" : ""; ?>>
                                    <option value="">Pilih Penguji Dua</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('penguji_2'); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <input type="hidden" name="jenis_tugas" value="<?= $page_header == 'Ilmiah' ? 'ilmiah' : 'tugas_besar'; ?>">
                    <input type="submit" class="btn btn-dark mb-3 float-right" style="background: #370EFA;border-color: #370EFA;" value="Unggah">
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="<?= base_url('assets/js/jquery.datetimepicker.full.js'); ?>"></script>
<script>
    jQuery('#datetimepicker').datetimepicker({
        format: 'Y/m/d H:i',
    });

    function onFileUpload() {
        var namaFile = $('.file-tugas')[0].files[0].name
        if (namaFile) {
            $('#nama-file-baru').html(namaFile)
        }
    }

    function onFilePreUpload() {
        var namaFile = $('.file-pre')[0].files[0].name
        if (namaFile) {
            $('#nama-file-pre-baru').html(namaFile)
        }
    }

    $(document).ready(function() {
        $('#pembimbing_1').change(function() {
            var id_pembimbing_1 = $(this).val();
            // console.log(id_pembimbing_1)
            $.ajax({
                url: '<?= base_url('spvresource/pengujidua'); ?>',
                method: 'POST',
                data: {
                    id_penguji_1: id_pembimbing_1
                },
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
                    var html = '<option value= 0> Pilih pembimbing dua </option>';
                    var i;
                    if (data.length == 0) {
                        html += '<option>Pembimbing tidak ditemukan</option>'
                    } else {
                        for (i = 0; i < data.length; i++) {
                            html += '<option value = ' + data[i].id + '>' + data[i].nama_lengkap + '</option>'
                        }
                    }
                    $('#pembimbing_2').html(html);
                    $('#penguji_1').html(html);
                }
            });
        });

        <?php if ($page_header == "Tugas Besar") { ?>

            $('#pembimbing_2').change(function() {
                var id_pembimbing_1 = $('#pembimbing_1').val();
                var id_pembimbing_2 = $(this).val();

                $.ajax({
                    url: '<?= base_url('spvresource/pembimbingsatu'); ?>',
                    method: 'POST',
                    data: {
                        id_penguji_1: id_pembimbing_1,
                        id_penguji_2: id_pembimbing_2,
                    },
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data)
                        var html = '<option>Pilih Supervisor</option>';
                        var i;
                        if (data.length == 0) {
                            html += '<option>Supervisor tidak ditemukan</option>'
                        } else {
                            for (i = 0; i < data.length; i++) {
                                html += '<option value = ' + data[i].id + '>' + data[i].nama_lengkap + '</option>'
                            }
                        }
                        $('#penguji_1').html(html);
                    }
                });
            });

            $('#penguji_1').change(function() {
                var id_pembimbing_1 = $('#pembimbing_1').val();
                var id_pembimbing_2 = $('#pembimbing_2').val();
                var id_penguji_1 = $(this).val();

                // console.log(id_pembimbing_2)

                $.ajax({
                    url: '<?= base_url('spvresource/pembimbingdua'); ?>',
                    method: 'POST',
                    data: {
                        id_penguji_1: id_pembimbing_1,
                        id_penguji_2: id_pembimbing_2,
                        id_pembimbing_1: id_penguji_1,
                    },
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data)
                        var html = '<option>Pilih Supervisor</option>';
                        var i;
                        if (data.length == 0) {
                            html += '<option>Supervisor tidak ditemukan</option>'
                        } else {
                            for (i = 0; i < data.length; i++) {
                                html += '<option value = ' + data[i].id + '>' + data[i].nama_lengkap + '</option>'
                            }
                        }
                        $('#penguji_2').html(html);
                    }
                });
            });

        <?php } ?>
    });
</script>
<?= $this->endSection(); ?>