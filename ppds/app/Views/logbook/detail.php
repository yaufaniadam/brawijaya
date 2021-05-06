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
                            <p class="mt-4"><b><?= $logbook->nama_lengkap; ?></b></p>
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
                            <div class="ml-4 mr-4">
                                <div class="title text-center">
                                    <h1><?= $logbook->judul; ?></h1>
                                </div>
                                <div class="mt-4">
                                    <div class="row text-center">
                                        <div class="col-sm-6 mr-0">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr class="text-left">
                                                        <td><b><span>Nama Pasien</span></b></td>
                                                        <td><span><?= $logbook->pasien; ?></span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-6 ml-0">
                                            <table class="table borderless">
                                                <tbody>
                                                    <tr class="text-left">
                                                        <td><b><span>Jenis Kelamin</span></b></td>
                                                        <td>
                                                            <span>
                                                                <?= $logbook->gender_pasien === 'p' ? 'Perempuan' : 'Laki-laki'; ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr class="text-left">
                                                        <td><b><span>Umur</span></b></td>
                                                        <td><span><?= $logbook->usia_pasien; ?></span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
        $('#logbook').addClass('active');
    </script>
    <?= $this->endSection(); ?>