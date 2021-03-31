<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content-inner">
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <?php if (session('success')) { ?>
                    <div class="alert-dismiss">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="fa fa-times"></span>
                            </button>
                        </div>
                    </div>
                <?php } ?>
                <?php if (session('warning')) { ?>
                    <div class="alert-dismiss">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?= session('warning'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="fa fa-times"></span>
                            </button>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-12 text-center">
                    <h1><?= $sidang->judul; ?></h1>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="text-center ml-auto mr-auto mt-3">
                            <p class="mt-2"><b><?= $sidang->ppds; ?></b></p>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div style="border: solid #6C757D;border-width: 2px;" class="col-7 mr-auto ml-auto mt-3">
                        <p>Sidang dimulai pada : </p>
                        <div class="ml-4 mr-4 mb-4 mt-0">
                            <div class="col-12 text-center">
                                <h3 class><?= $sidang->jadwal_sidang; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-7 mr-auto ml-auto mt-5">
                        <div class="row">
                            <?php if ($sidang->jenis_tugas == 2) { ?>
                                <div class="mr-auto ml-auto text-center">
                                    <p class="text-secondary"><?= $sidang->pj1; ?></p>
                                    <h5>Penguji 1</h5>
                                </div>
                                <div class="mr-auto ml-auto text-center">
                                    <p class="text-secondary"><?= $sidang->pj2; ?></p>
                                    <h5>Penguji 2</h5>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row mt-5">
                            <div class="mr-auto ml-auto text-center">
                                <p class="text-secondary"><?= $sidang->pb1; ?></p>
                                <h5>Pembimbing 1</h5>
                            </div>
                            <?php if (isset($sidang->pb2)) { ?>
                                <div class="mr-auto ml-auto text-center">
                                    <p class="text-secondary"><?= $sidang->pb2; ?></p>
                                    <h5>Pembimbing 2</h5>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <form action="<?= base_url('sidang/absen'); ?>" method="POST">
                        <input class="" type="hidden" name="id_sidang" value="<?= $sidang->id; ?>">
                        <?php if (session('role') != 4) { ?>
                            <input type="submit" class="btn btn-flat btn-outline-dark mb-3 mt-3" value="aktifkan qr-code">
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h5>Daftar Hadir</h5>
                </div>
                <div class="data-tables datatable-dark">
                    <table id="dataTable3" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th style="width: 60%;">Nama</th>
                                <th style="width: 20%;">Stase</th>
                                <!-- <th style="width: 20%;">Tahap</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($daftar_hadir as $ppds) { ?>
                                <tr>
                                    <td><?= $ppds['nama_lengkap']; ?></td>
                                    <td><?= $ppds['stase']; ?></td>
                                    <!-- <td>asdas</td> -->
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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
    //trigger menu
    $('#sidang').addClass('active');

    $('#dataTable3').DataTable();
    $('#dashboard').addClass('active');
</script>
<?= $this->endSection(); ?>

<?= $this->section('data_css'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<?= $this->endSection(); ?>