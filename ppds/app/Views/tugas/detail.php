<?php helper('data_helper') ?>

<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content-inner">
    <div class="row m-4">
        <div class="col-sm-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="col">
                        <div class="text-center">
                            <div style="background-image: url('<?= base_url('images/profile/dummy.png'); ?>');width:200px;height:200px;background-position:center center;background-size:100%;border-radius: 100%;background-repeat: no-repeat;" class="ml-auto mr-auto">
                            </div>
                            <p class="mt-2"><b><?= $tugas['nama_lengkap']; ?></b></p>
                        </div>
                        <div class="mt-3 ml-auto mr-auto">
                            <div class="form-group row">
                                <label class="col-sm-7 col-form-label">Diunggah</label>
                                <label class="col-sm-5 col-form-label text-right">20-06-2020</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-7 col-form-label">Tanggal Sidang</label>
                                <label class="col-sm-5 col-form-label text-right"><?= $tugas['jadwal_sidang']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-7 col-form-label">Stase</label>
                                <label class="col-sm-5 col-form-label text-right"><?= $tugas['stase']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-7 col-form-label">Nilai</label>
                                <label class="col-sm-5 col-form-label text-right"><?= ($tugas['nilai_1'] + $tugas['nilai_2'] + $tugas['nilai_3'] + $tugas['nilai_4']) / 4; ?></label>
                            </div>
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
                            <div class="ml-4 mr-3">
                                <h1><?= $tugas['judul']; ?></h1>
                                <div class="mt-4">
                                    <p><?= $tugas['deskripsi']; ?></p>
                                </div>
                                <div class="col-sm-12 mt-4">
                                    <div class="row">
                                        <a href="<?= base_url('ppds_tugas/' . $tugas['file']); ?>" class="btn btn-flat btn-xl btn-outline-dark mb-3 mr-3 btn-block">Unduh File</a>
                                        <?php if (session('role') == 3 || session('role') == 1) { ?>
                                            <button type="button" class="btn btn-flat btn-xl btn-outline-dark mb-3 mr-3 btn-block" data-toggle="modal" data-target="#exampleModalCenter">Masukkan Nilai</button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <?php if (session('role') == 3 || session('role') == 1) { ?>
        <div class="modal fade" id="exampleModalCenter">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('tugas/nilai/post'); ?>" method="POST">
                        <input type="hidden" name="hidden_tugas_id" value="<?= $tugas['id']; ?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <?php if (checkSpvPosition('id_penguji_1', $tugas['id']) || session('role') == 1) { ?>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Nilai Penguji 1</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="nilai_1" class="form-control" id="" value="<?= $tugas['nilai_1']; ?>">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <input type="hidden" name="hidden_nilai_1" value="<?= $tugas['nilai_1']; ?>">

                        <?php if (checkSpvPosition('id_penguji_2', $tugas['id']) || session('role') == 1) { ?>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Nilai Penguji 2</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="nilai_2" class="form-control" id="" value="<?= $tugas['nilai_2']; ?>">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <input type="hidden" name="hidden_nilai_2" value="<?= $tugas['nilai_2']; ?>">

                        <?php if (checkSpvPosition('id_pembimbing_1', $tugas['id']) || session('role') == 1) { ?>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Nilai Pembimbing 1</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="nilai_3" class="form-control" id="" value="<?= $tugas['nilai_3']; ?>">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <input type="hidden" name="hidden_nilai_3" value="<?= $tugas['nilai_3']; ?>">

                        <?php if (checkSpvPosition('id_pembimbing_2', $tugas['id']) || session('role') == 1) { ?>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Nilai Pembimbing 2</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="nilai_4" class="form-control" id="" value="<?= $tugas['nilai_4']; ?>">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <input type="hidden" name="hidden_nilai_4" value="<?= $tugas['nilai_4']; ?>">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-flat btn-outline-secondary mb-3" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-flat btn-outline-primary mb-3" value="Masukkan Nilai">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Modal -->
    <?= $this->endSection(); ?>

    <?= $this->section('data_table'); ?>
    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <?= $this->endSection(); ?>

    <?= $this->section('js'); ?>
    <script>
    </script>
    <?= $this->endSection(); ?>