<?php helper('data_helper') ?>

<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content-inner">

    <?php
    // echo '<pre>';
    // print_r($ppds);
    // echo '</pre>';

    ?>
    <div class="row m-4">
        <div class="col-sm-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="col">
                        <div class="text-center">
                            <div style="background-image: url(<?= $ppds->photo == '' ? base_url('images/profile/dummy.png') : base_url('users_profile_pic/' . $ppds->photo); ?>);width:200px;height:200px;background-position:center center;background-size:100%;border-radius: 100%;background-repeat: no-repeat;" class="ml-auto mr-auto">
                            </div>
                            <p class="mt-2"><b><?= $ppds->nama_lengkap; ?></b></p>
                        </div>
                        <div class="mt-3 ml-auto mr-auto">
                            <div class="form-group row">
                                <label class="col-sm-7 col-form-label">Stase</label>
                                <label class="col-sm-5 col-form-label text-right"><?= $ppds->stase == 'temp' ? 'menunggu konfirmasi admin' : $ppds->stase; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-7 col-form-label">Tahap</label>
                                <label class="col-sm-5 col-form-label text-right"><?= $ppds->tahap; ?></label>
                            </div>
                            <?php if (session('role') == 1) { ?>
                                <?php if ($tahap_selesai) { ?>
                                    <?php if ($semua_tahap_selesai) { ?>
                                        <div class="form-group row">
                                            <button type="button" disabled class="tipe_btn btn btn-flat btn-outline-dark mb-3 btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter" id="tahap">
                                                PPDS telah menyelesaikan <br> semua tahap
                                            </button>
                                        </div>
                                    <?php } else { ?>
                                        <div class="form-group row">
                                            <button type="button" class="tipe_btn btn btn-flat btn-outline-dark mb-3 btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter" id="tahap">Tahap Selesai</button>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php if ($ppds->id_stase != 25) { ?>
                                        <div class="form-group row">
                                            <button type="button" class="tipe_btn btn btn-flat btn-outline-dark mb-3 btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter" id="stase">Stase Selesai</button>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8 mt-5">
            <div class="col">
                <div>
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <div class="col-sm-12 mt-4">
                                    <div id="headingOne">
                                        <h2 class="mb-0">
                                            <a href="#" class="btn btn-danger btn-block text-left" type="button" data-toggle="collapse" data-target="#detail" aria-expanded="true" aria-controls="detail">
                                                Detail PPDS
                                            </a>
                                        </h2>
                                    </div>
                                    <div id="detail" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body" style="border : solid #EFF1F2; border-top: none; border-bottom-left-radius: 5px; border-bottom-right-radius:5px;">
                                            <div id="headingOne">
                                                <table class="table">
                                                    <a class="btn btn-dark mb-3 float-left" style="background: #370EFA;border-color: #370EFA;" href="<?= base_url('admin/users/' . $ppds->id_ppds); ?>">Edit Profile</a>
                                                    <tr>
                                                        <th scope="col">Nama Lengkap</th>

                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Usia</th>
                                                        <th scope="col"><?= $ppds->usia; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Supervisor</th>
                                                        <th scope="col"><?= $ppds->spv; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Jenis Kelamin</th>
                                                        <th scope="col"><?= $ppds->jenis_kelamin_ppds == 'l' ? 'laki-laki' : 'perempuan'; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Alamat Asal</th>
                                                        <th scope="col"><?= $ppds->alamat_asal; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Alamat Domisili</th>
                                                        <th scope="col"><?= $ppds->alamat_domisili; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">No. Telp</th>
                                                        <th scope="col"><?= $ppds->no_telp; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">No. Telp Keluarga/Darurat</th>
                                                        <th scope="col"><?= $ppds->no_telp_drt; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">NIM</th>
                                                        <th scope="col"><?= $ppds->nim; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Status</th>
                                                        <th scope="col"><?= $ppds->status; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">NO SIP</th>
                                                        <th scope="col"><?= $ppds->no_sip; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">NO STR</th>
                                                        <th scope="col"><?= $ppds->no_str; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">NO BPJS</th>
                                                        <th scope="col"><?= $ppds->no_bpjs; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">NO Rekening</th>
                                                        <th scope="col"><?= $ppds->no_rekening; ?></th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <?php foreach ($tahap as $tahap) { ?>
                                        <div id="headingOne">
                                            <h2 class="mb-0">
                                                <a href="#" class="btn btn-primary btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?= $tahap['id'] ?>" aria-expanded="true" aria-controls="collapse<?= $tahap['id'] ?>">
                                                    Tahap <?= $tahap['tahap']; ?>
                                                </a>
                                            </h2>
                                        </div>
                                        <div id="collapse<?= $tahap['id'] ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body" style="border : solid #EFF1F2; border-top: none; border-bottom-left-radius: 5px; border-bottom-right-radius:5px;">
                                                <?php foreach (getStasePpdsBasedOnTahap($tahap['tahap'], $ppds->id_ppds) as $stase) { ?>
                                                    <div id="headingOne">
                                                        <h2 class="mb-0">
                                                            <a href="#" class="btn btn-primary btn-block text-left" type="button" data-toggle="collapse" data-target="#ChildCollapse<?= $stase['id_stase'] ?>" aria-expanded="true" aria-controls="ChildCollapse<?= $stase['id_stase'] ?>">
                                                                <?= $stase['stase']; ?> (<?= $stase['tanggal_mulai']; ?> s.d <?= $stase['tanggal_selesai']; ?>)
                                                            </a>
                                                        </h2>
                                                    </div>
                                                    <div id="ChildCollapse<?= $stase['id_stase'] ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                        <div class="card-body" style="border : solid #EFF1F2; border-top: none; border-bottom-left-radius: 5px; border-bottom-right-radius:5px;">
                                                            <h6>Ilmiah</h6>
                                                            <table class="table" style="border: solid #EAECEE;border-width: thin;">

                                                                <thead>
                                                                    <tr style="background-color: #F8F9FB;">
                                                                        <th scope="col" style="width: 60%;">Judul Ilmiah</th>
                                                                        <th scope="col" style="width: 20%;">Kategori</th>
                                                                        <th scope="col" style="width: 20%;">Unduh</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach (getPpdsTugas(1, $ppds->id_ppds, $stase['id_stase']) as $ilmiah) { ?>
                                                                        <tr>
                                                                            <th><a href="<?= base_url('tugas/' . $ilmiah['id_tugas']); ?>"><?= $ilmiah['judul']; ?></a></th>
                                                                            <td><?= $ilmiah['kategori']; ?></td>
                                                                            <td><a href="<?= base_url('ppds_tugas/' . $ilmiah['file']); ?>">Unduh</a></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                            <h6>Tugas Besar</h6>
                                                            <table class="table" style="border: solid #EAECEE;border-width: thin;">

                                                                <thead>
                                                                    <tr style="background-color: #F8F9FB;">
                                                                        <th scope="col" style="width: 60%;">Judul Ilmiah</th>
                                                                        <th scope="col" style="width: 20%;">Kategori</th>
                                                                        <th scope="col" style="width: 20%;">Unduh</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach (getPpdsTugas(2, $ppds->id_ppds, $stase['id_stase']) as $ilmiah) { ?>
                                                                        <tr>
                                                                            <th><a href="<?= base_url('tugas/' . $ilmiah['id_tugas']); ?>"><?= $ilmiah['judul']; ?></a></th>
                                                                            <td><?= $ilmiah['kategori']; ?></td>
                                                                            <td><a href="<?= base_url('ppds_tugas/' . $ilmiah['file']); ?>">Unduh</a></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <br>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <br>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="<?= base_url('admin/ppds/staseselesai'); ?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close mb-3" data-dismiss="modal"><span>×</span></button>
                        <input type="hidden" name="id_ppds" value="<?= $ppds->id_ppds; ?>">
                        <input type="hidden" name="type" id="type_btn" value="">
                        <br>
                        <div class="text-center">
                            <img src="<?= base_url('images/icon/warning.svg'); ?>" style="width: 110px;" alt="" srcset="">
                        </div>
                        <br>
                        <h3 class="text-center">Anda yakin?</h3>
                        <p class="text-center mt-2">
                            Aksi ini tidak dapat dibatalkan. Pastikan PPDS sudah menyelesaikan semua tugas ilmiah sebelum melanjutkan.
                        </p>
                        <br>
                        <div class="row text-center">
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pilih_keterangan" id="exampleRadios1" value="lulus">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Lulus
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pilih_keterangan" id="exampleRadios2" value="dengan_keterangan">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Dengan Keterangan
                                    </label>
                                </div>
                                <div class='form-group' style="display:none" id="keterangan_field">
                                    <textarea name="keterangan" class='form-control' id='keterangan' rows='3'></textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="button" class="btn btn-flat btn-outline-secondary mb-3" data-dismiss="modal">Batal</button>
                            <input disabled type="submit" id="confirm" class="btn btn-flat btn-outline-danger mb-3" value="Ya">
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
    //trigger menu
    $('#ppds').addClass('active');

    $(".tipe_btn").click(function() {
        getIdButton = this.id;
        $("#type_btn").val(getIdButton);
    });

    $('input[type=radio][name=pilih_keterangan]').change(function() {
        if ($(this).val() == 'dengan_keterangan') {
            $("#keterangan_field").show();
            $("#keterangan").prop('required', true);
            $("#confirm").prop('disabled', false);
        } else {
            $("#keterangan_field").hide();
            $("#keterangan").prop('required', false);
            $("#confirm").prop('disabled', false);
        }
    });
</script>
<?= $this->endSection(); ?>