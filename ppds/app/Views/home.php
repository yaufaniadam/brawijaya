<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content-inner">
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <?php if (session('warning')) { ?>
                    <div class="alert-dismiss">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session('warning'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="fa fa-times"></span>
                            </button>
                        </div>
                    </div>
                <?php } ?>
                <?php if (session('role') == 4) { ?>
                    <b>
                        <h5>Selamat datang <?= $user_data->nama_lengkap == '' ? 'PPDS' : $user_data->nama_lengkap; ?></h5>
                    </b>
                <?php } elseif (session('role') == 3 || session('role') == 1) { ?>
                    <b>
                        <h5>Selamat datang</h5>
                    </b>
                <?php } ?>
            </div>
        </div>
        <?php if (session('role') == 4) { ?>
            <div class="row mt-4">
                <div class="col-3">
                    <div class="single-report mb-xs-30">
                        <div class="s-report-inner pr--20 pt--30 mb-3">
                            <div class="icon"><i class="fa fa-file"></i></div>
                            <div class="s-report-title d-flex justify-content-between">
                                <h4 class="header-title mb-0">Ilmiah Saya</h4>
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <h2></h2>
                                <h2><?= $my_ilmiah; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="single-report mb-xs-30">
                        <div class="s-report-inner pr--20 pt--30 mb-3">
                            <div class="icon bg-warning"><i class="fa fa-file"></i></div>
                            <div class="s-report-title d-flex justify-content-between">
                                <h4 class="header-title mb-0">Tugas Besar</h4>
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <h2></h2>
                                <h2><?= $my_tugas_besar; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="single-report mb-xs-30">
                        <div class="s-report-inner pr--20 pt--30 mb-3">
                            <div class="icon bg-danger"><i class="fa fa-user"></i></div>
                            <div class="s-report-title d-flex justify-content-between">
                                <h4 class="header-title mb-0">Stase Saat ini</h4>
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <h2></h2>
                                <h2><?= $user_data->stase == 'temp' ? 'menunggu konfirmasi admin' : $user_data->stase; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-6">
                    <div class="single-report mb-xs-30">

                        <div class="container mt-2">
                            <h4 class="header-title">Sidang Saya</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-dark">
                                            <tr class="text-white">
                                                <th scope="col">Sidang</th>
                                                <th scope="col">Tanggal Sidang</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php if ($my_incoming_sidang) { ?>
                                                <?php foreach ($my_incoming_sidang as $sidang) { ?>
                                                    <tr>
                                                        <td scope="row"><?= $sidang['judul']; ?></td>
                                                        <td><?= $sidang['jadwal_sidang']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <tr>
                                                    <td colspan="2">Tidak ada sidang</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="single-report mb-xs-30">
                        <div class="container mt-2">
                            <h4 class="header-title">Sidang Terdekat</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-dark">
                                            <tr class="text-white">
                                                <th scope="col">Sidang</th>
                                                <th scope="col">Tanggal Sidang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($incoming_sidang) { ?>
                                                <?php foreach ($incoming_sidang as $sidang) { ?>
                                                    <tr>
                                                        <td scope="row"><?= $sidang['judul']; ?></td>
                                                        <td><?= $sidang['jadwal_sidang']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <tr>
                                                    <td colspan="2">Tidak ada sidang</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } elseif (session('role') == 1) { ?>
            <div class="row mt-4">
                <div class="col-4">
                    <div class="single-report mb-xs-30">
                        <div class="s-report-inner pr--20 pt--30 mb-3">
                            <div class="icon"><i class="fa fa-file"></i></div>
                            <div class="s-report-title d-flex justify-content-between">
                                <h4 class="header-title mb-0"><a href="<?= base_url('admin/new_users'); ?>">Perlu Diverifikasi</a></h4>
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <h2></h2>
                                <h2><?= $number_of_new_users; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="single-report mb-xs-30">
                        <div class="s-report-inner pr--20 pt--30 mb-3">
                            <div class="icon bg-warning"><i class="fa fa-file"></i></div>
                            <div class="s-report-title d-flex justify-content-between">
                                <h4 class="header-title mb-0"><a href="<?= base_url('admin/ppds/tahap/0'); ?>">Semua PPDS</a></h4>
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <h2></h2>
                                <h2><?= $number_of_ppds; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="single-report mb-xs-30">
                        <div class="s-report-inner pr--20 pt--30 mb-3">
                            <div class="icon bg-success"><i class="fa fa-file"></i></div>
                            <div class="s-report-title d-flex justify-content-between">
                                <h4 class="header-title mb-0"><a href="<?= base_url('/admin/supervisor'); ?>">Semua Supervisor</a></h4>
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <h2></h2>
                                <h2><?= $number_of_spv; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>
    $('#dashboard').addClass('active');
</script>
<?= $this->endSection(); ?>